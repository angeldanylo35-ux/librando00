<script setup>
import { ref, computed, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import api from '../services/api'

const router = useRouter()

const icons = {
  home: '<path d="M3 10.5 12 3l9 7.5V20a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1z"/>',
  explore: '<circle cx="12" cy="12" r="9"/><path d="m15.5 8.5-2 5-5 2 2-5z"/>',
  video: '<polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/>',
  send: '<path d="M21 3 3 10.5l7 3 3 7z"/><path d="M21 3 10 13.5"/>',
  heart: '<path d="M12 20.5s-8-4.7-8-11A4.5 4.5 0 0 1 12 7a4.5 4.5 0 0 1 8 2.500c0 6.300-8 11-8 11z"/>',
  bookmark: '<path d="M6 3h12v18l-6-4-6 4z"/>',
  user: '<circle cx="12" cy="12" r="9"/><circle cx="12" cy="10" r="3"/><path d="M6 18.500c1.500-2.500 3.500-3.500 6-3.500s4.500 1 6 3.500"/>',
  plus: '<rect x="3" y="3" width="18" height="18" rx="3"/><path d="M12 8v8M8 12h8"/>',
  menu: '<path d="M4 6h16M4 12h16M4 18h16"/>',
  search: '<circle cx="11" cy="11" r="7"/><path d="m20 20-3.500-3.500"/>',
  comment: '<path d="M21 11.500a8.500 8.500 0 0 1-12.600 7.400L3 20.500l1.600-5A8.500 8.500 0 1 1 21 11.500z"/>',
  more: '<circle cx="5" cy="12" r="1.200"/><circle cx="12" cy="12" r="1.200"/><circle cx="19" cy="12" r="1.200"/>',
  smile: '<circle cx="12" cy="12" r="9"/><path d="M8 14.500c1 1.200 2.300 1.800 4 1.800s3-.6 4-1.800"/><circle cx="9" cy="9.800" r=".6"/><circle cx="15" cy="9.800" r=".6"/>',
  chevron: '<path d="m9 6 6 6-6 6"/>',
  hash: '<path d="M5 9h14M5 15h14M10 4 8 20M16 4l-2 20"/>',
  hand: '<path d="M8 12V5.500a1.500 1.500 0 0 1 3 0V11m0-6.500a1.500 1.500 0 0 1 3 0V11m0-4.500a1.500 1.500 0 0 1 3 0V13m0-3.500a1.500 1.500 0 0 1 3 0V15c0 4-3 6.500-6.500 6.500S8 19.500 6 16.500L4 13.500a1.500 1.500 0 0 1 2.500-1.500L8 14"/>',
  arrowUp: '<path d="M7 17 17 7M8 7h9v9"/>',
  film: '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 9h18M7 5l2 4M12 5l2 4M17 5l2 4"/>',
  poll: '<path d="M4 20V10M10 20V4M16 20v-7M22 20H2"/>',
  repost: '<polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/>'
}

/* Perfil do usuário logado (vem do banco: GET /perfil) */
const perfil = ref({
  id: null,
  nome: localStorage.getItem('nome') || '',
  nome_usuario: localStorage.getItem('nome_usuario') || '',
  foto_perfil_url: '',
})

const nome = computed(() => perfil.value.nome || 'Usuário')
const nomeUsuario = computed(() => perfil.value.nome_usuario || 'usuario')

function iniciais(texto) {
  return (
    (texto || '?')
      .trim()
      .split(/\s+/)
      .slice(0, 2)
      .map((p) => p[0])
      .join('')
      .toUpperCase() || '?'
  )
}

const meuInicial = computed(() => iniciais(nome.value))

async function carregarPerfil() {
  try {
    const { data } = await api.get('/perfil')
    perfil.value = data.perfil
    localStorage.setItem('nome', data.perfil.nome)
    localStorage.setItem('nome_usuario', data.perfil.nome_usuario)
  } catch (e) {
    // sem conexão
  }
}

const navItems = [
  { label: 'Página inicial', icon: 'home', route: '/feed', active: true },
  { label: 'Explorar', icon: 'explore' },
  { label: 'Vídeos', icon: 'video' },
  { label: 'Mensagens', icon: 'send', badge: 3 },
  { label: 'Notificações', icon: 'heart' },
  { label: 'Salvos', icon: 'bookmark' },
  { label: 'Meu perfil', icon: 'user', route: '/perfil' },
  { label: 'Mais', icon: 'menu' },
]

const tabs = ['Para você', 'Seguindo']
const activeTab = ref('Para você')

/* Feed */
const posts = ref([])
const carregandoFeed = ref(true)
const erroFeed = ref('')

/* Estado da edição e exclusão */
const postEmEdicao = ref(null)
const conteudoEdicao = ref('')
const salvandoEdicao = ref(false)
const postSendoExcluido = ref(null)
const feedbackPost = ref('')
const feedbackPostOk = ref(false)

function tempo(iso) {
  const seg = Math.floor((Date.now() - new Date(iso).getTime()) / 1000)
  if (seg < 60) return 'agora'
  if (seg < 3600) return `${Math.floor(seg / 60)} min`
  if (seg < 86400) return `${Math.floor(seg / 3600)} h`
  return `${Math.floor(seg / 86400)} d`
}

function mapearPost(p) {
  return {
    id: p.id,
    tipo: p.tipo,
    user: p.usuario.nome_usuario,
    initials: iniciais(p.usuario.nome),
    foto: p.usuario.foto_perfil_url || '',
    role: p.usuario.nome,
    time: tempo(p.criado_em),
    caption: p.conteudo || '',
    midiaUrl: p.midia_url,
    opcoes: p.opcoes || [],
    likes: 178,
    comments: 24,
    reposts: 42,
    curtiu: false,
    comentou: false,
    repostou: false,
    salvou: false,
    own: p.usuario.nome_usuario === nomeUsuario.value,
  }
}

function tratarErroAuth(erro) {
  if (erro.response?.status === 401) {
    localStorage.removeItem('token')
    router.push('/login')
    return true
  }
  return false
}

async function carregarFeed() {
  carregandoFeed.value = true
  erroFeed.value = ''

  try {
    const { data } = await api.get('/posts')
    posts.value = data.posts.map(mapearPost)
  } catch (erro) {
    if (tratarErroAuth(erro)) return
    erroFeed.value = 'Não foi possível carregar o feed.'
  } finally {
    carregandoFeed.value = false
  }
}

function alternarCurtida(post) {
  post.curtiu = !post.curtiu
  post.curtiu ? post.likes++ : post.likes--
}

function alternarComentario(post) {
  post.comentou = !post.comentou
  post.comentou ? post.comments++ : post.comments--
}

function iniciarEdicao(post) {
  if (!post.own) return
  postEmEdicao.value = post.id
  conteudoEdicao.value = post.caption || ''
  feedbackPost.value = ''
}

function cancelarEdicao() {
  postEmEdicao.value = null
  conteudoEdicao.value = ''
}

async function salvarEdicao(post) {
  const conteudo = conteudoEdicao.value.trim()
  if (!conteudo || salvandoEdicao.value) return

  salvandoEdicao.value = true
  feedbackPost.value = ''

  try {
    const { data } = await api.put(`/posts/${post.id}`, { conteudo })
    const indice = posts.value.findIndex((item) => item.id === post.id)

    if (indice !== -1) {
      posts.value[indice] = data.post
        ? mapearPost(data.post)
        : { ...posts.value[indice], caption: conteudo }
    }

    cancelarEdicao()
    feedbackPostOk.value = true
    feedbackPost.value = data.mensagem || 'Publicação atualizada com sucesso.'
  } catch (erro) {
    if (tratarErroAuth(erro)) return
    feedbackPostOk.value = false
    feedbackPost.value = erro.response?.data?.mensagem || 'Não foi possível atualizar a publicação.'
  } finally {
    salvandoEdicao.value = false
  }
}

async function excluirPost(post) {
  if (!post.own || postSendoExcluido.value !== null) return
  const confirmar = window.confirm('Tem certeza de que deseja excluir esta publicação?')
  if (!confirmar) return

  postSendoExcluido.value = post.id
  feedbackPost.value = ''

  try {
    const { data } = await api.delete(`/posts/${post.id}`)
    posts.value = posts.value.filter((item) => item.id !== post.id)
    if (postEmEdicao.value === post.id) cancelarEdicao()
    feedbackPostOk.value = true
    feedbackPost.value = data.mensagem || 'Publicação excluída com sucesso.'
  } catch (erro) {
    if (tratarErroAuth(erro)) return
    feedbackPostOk.value = false
    feedbackPost.value = erro.response?.data?.mensagem || 'Não foi possível excluir a publicação.'
  } finally {
    postSendoExcluido.value = null
  }
}

function navegarPara(route) {
  if (route) router.push(route)
}

onMounted(async () => {
  await carregarPerfil()
  carregarFeed()
})

/* Caixa de criação de post */
const MAX_CHARS = 280
const draft = ref('')
const arquivo = ref(null)
const previewUrl = ref('')
const modoEnquete = ref(false)
const opcoes = ref(['', ''])
const composerFocused = ref(false)
const publicando = ref(false)
const feedback = ref('')
const feedbackOk = ref(false)
const inputArquivo = ref(null)

const remaining = computed(() => MAX_CHARS - draft.value.length)

const tipoAtual = computed(() => {
  if (modoEnquete.value) return 'enquete'
  const mime = arquivo.value?.type ?? ''
  if (mime === 'image/gif') return 'gif'
  if (mime.startsWith('image/')) return 'imagem'
  if (mime.startsWith('video/')) return 'video'
  return 'texto'
})

const canPublish = computed(() => {
  if (publicando.value) return false
  if (modoEnquete.value) {
    const preenchidas = opcoes.value.filter((o) => o.trim()).length
    return draft.value.trim().length > 0 && preenchidas >= 2
  }
  return draft.value.trim().length > 0 || !!arquivo.value
})

function abrirSeletor() {
  inputArquivo.value?.click()
}

function escolherArquivo(event) {
  const f = event.target.files[0] ?? null
  if (!f) return
  modoEnquete.value = false
  arquivo.value = f
  previewUrl.value = URL.createObjectURL(f)
  feedback.value = ''
}

function removerArquivo() {
  arquivo.value = null
  previewUrl.value = ''
  if (inputArquivo.value) inputArquivo.value.value = ''
}

function alternarEnquete() {
  modoEnquete.value = !modoEnquete.value
  if (modoEnquete.value) removerArquivo()
}

function adicionarOpcao() {
  if (opcoes.value.length < 4) opcoes.value.push('')
}

function removerOpcao(i) {
  if (opcoes.value.length > 2) opcoes.value.splice(i, 1)
}

function cancelar() {
  draft.value = ''
  removerArquivo()
  modoEnquete.value = false
  opcoes.value = ['', '']
  feedback.value = ''
}

async function publish() {
  if (!canPublish.value) return
  publicando.value = true
  feedback.value = ''

  const form = new FormData()
  form.append('tipo', tipoAtual.value)
  form.append('conteudo', draft.value.trim())

  if (arquivo.value) {
    form.append('midia', arquivo.value)
  }

  if (modoEnquete.value) {
    opcoes.value.map((o) => o.trim()).filter(Boolean).forEach((o) => form.append('opcoes[]', o))
  }

  try {
    const { data } = await api.post('/posts', form, {
      headers: { 'Content-Type': 'multipart/form-data' },
    })

    posts.value.unshift(mapearPost(data.post))
    cancelar()
    feedbackOk.value = true
    feedback.value = data.mensagem
    setTimeout(() => (feedback.value = ''), 4000)
  } catch (erro) {
    if (tratarErroAuth(erro)) return
    feedbackOk.value = false
    feedback.value = erro.response?.data?.mensagem ?? 'Não foi possível realizar a publicação.'
  } finally {
    publicando.value = false
  }
}
</script>

<template>
  <div class="min-h-screen bg-[#F8F9FA] pl-0 min-[980px]:pl-56 text-left font-sans text-[#1A1A1A] antialiased pb-24 min-[980px]:pb-0">
    
    <!-- SIDEBAR / BARRA INFERIOR NO MOBILE -->
    <aside class="fixed inset-x-0 bottom-0 z-20 flex flex-row justify-around items-center border-t border-gray-200 bg-white px-2 py-3 min-[980px]:inset-y-0 min-[980px]:left-0 min-[980px]:w-56 min-[980px]:flex-col min-[980px]:justify-start min-[980px]:px-4 min-[980px]:py-8 min-[980px]:border-r min-[980px]:border-t-0">
      
      <!-- LOGO (Exibido na barra lateral apenas no Desktop 980px+) -->
      <div class="hidden min-[980px]:block px-1">
        <h1 class="text-[32px] font-extrabold leading-none tracking-tight" style="color: #635BFF !important;">
          Librando.
        </h1>
        <p class="mt-1.5 text-[11px] font-medium tracking-wide" style="color: #1A1A1A !important;">
          CONEXÕES EM LIBRAS
        </p>
      </div>

      <!-- NAVEGAÇÃO -->
      <nav class="flex w-full flex-row justify-around items-center min-[980px]:mt-6 min-[980px]:flex-col min-[980px]:items-stretch min-[980px]:gap-1" aria-label="Principal">
        <button
          v-for="item in navItems"
          :key="item.label"
          type="button"
          class="relative flex items-center justify-center gap-2 rounded-lg p-2.5 min-[980px]:px-3 min-[980px]:py-3 min-[980px]:justify-start min-[980px]:text-[16px] transition-colors"
          :class="item.active ? 'text-[#635BFF] min-[980px]:bg-[#EEEDFF] min-[980px]:font-medium' : 'text-[#1A1A1A] hover:bg-gray-50'"
          :aria-current="item.active ? 'page' : undefined"
          @click="navegarPara(item.route)"
        >
          <svg
            viewBox="0 0 24 24"
            class="h-6 w-6 shrink-0"
            fill="none"
            stroke="currentColor"
            stroke-width="1.7"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true"
            v-html="icons[item.icon]"
          />
          <span class="hidden min-[980px]:inline">{{ item.label }}</span>
          
          <!-- BADGE POSICIONADA DENTRO DO ÍCONE NO MOBILE -->
          <span
            v-if="item.badge"
            class="absolute top-1 right-1.5 min-[980px]:static min-[980px]:ml-auto flex h-4 w-4 min-[980px]:h-5.5 min-[980px]:min-w-5.5 items-center justify-center rounded-full bg-[#635BFF] text-[10px] min-[980px]:text-[12px] font-semibold text-white"
          >
            {{ item.badge }}
          </span>
        </button>

        <!-- Botão criar vídeo -->
        <button
          type="button"
          class="hidden min-[980px]:mt-3 min-[980px]:flex items-center justify-center gap-3 rounded-lg border border-gray-200 bg-white px-3 py-3 text-[15px] font-semibold text-[#1A1A1A] transition-colors hover:bg-gray-50"
        >
          <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" v-html="icons.plus" />
          Criar vídeo
        </button>
      </nav>

      <!-- PERFIL DO USUÁRIO NA SIDEBAR (Apenas Desktop 980px+) -->
      <div class="mt-auto hidden min-[980px]:block">
        <div class="mt-3 border-t border-gray-200 pt-4">
          <button type="button" class="flex w-full items-center gap-3 rounded-lg px-2 py-2 text-left hover:bg-gray-50" @click="router.push('/perfil')">
            <img
              v-if="perfil.foto_perfil_url"
              :src="perfil.foto_perfil_url"
              class="h-9 w-9 shrink-0 rounded-full object-cover"
              alt=""
            />
            <span
              v-else
              class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#1A1A1A] text-[13px] font-semibold text-white"
            >
              {{ meuInicial }}
            </span>
            <span class="min-w-0 flex-1">
              <span class="block truncate text-[14px] font-semibold">{{ nome }}</span>
              <span class="block truncate text-[12px] text-gray-500">@{{ nomeUsuario }}</span>
            </span>
          </button>
        </div>
      </div>
    </aside>

    <!-- CONTEÚDO PRINCIPAL -->
    <div class="mx-auto grid max-w-285 grid-cols-1 justify-center gap-6 px-4 py-4 min-[980px]:gap-12 min-[980px]:px-8 min-[980px]:py-8 min-[980px]:grid-cols-[minmax(0,720px)_minmax(0,320px)]">
      <main class="min-w-0">
        <header class="mb-5 flex items-center justify-between">
          <!-- Esquerda: Título -->
          <div class="flex-1 text-left">
            <h2
              class="text-[18px] min-[980px]:text-[24px] font-bold tracking-tight"
              style="color: #1A1A1A !important; -webkit-text-fill-color: #1A1A1A !important; opacity: 1 !important; visibility: visible !important;"
            >
              Seu mundo em Libras.
            </h2>
          </div>

          <!-- Centro: Logo Librando (Visível apenas em telas menores que 980px) -->
          <div class="flex-1 text-center min-[980px]:hidden">
            <h1 class="text-[22px] font-extrabold" style="color: #635BFF !important;">
              Librando.
            </h1>
          </div>

          <!-- Direita: Abas -->
          <div class="flex-1 flex justify-end gap-4 min-[980px]:gap-6 text-[14px]" role="tablist">
            <button
              v-for="tab in tabs"
              :key="tab"
              type="button"
              role="tab"
              :aria-selected="activeTab === tab"
              class="border-b-2 pb-1.5 transition-colors shrink-0"
              :class="activeTab === tab ? 'border-[#635BFF] font-medium text-[#635BFF]' : 'border-transparent text-gray-600'"
              @click="activeTab = tab"
            >
              {{ tab }}
            </button>
          </div>
        </header>

        <!-- CRIAR PUBLICAÇÃO -->
        <section
          class="mb-5 rounded-2xl border border-gray-200 bg-white p-4 transition-shadow"
          :class="composerFocused ? 'ring-2 ring-[#635BFF]/30' : ''"
          aria-label="Criar publicação"
        >
          <div class="flex gap-3">
            <img
              v-if="perfil.foto_perfil_url"
              :src="perfil.foto_perfil_url"
              class="h-10 w-10 shrink-0 rounded-full object-cover"
              alt=""
            />
            <span
              v-else
              class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#1A1A1A] text-[13px] font-semibold text-white"
            >
              {{ meuInicial }}
            </span>

            <div class="min-w-0 flex-1">
              <label for="composer" class="sr-only">O que quer compartilhar?</label>
              <textarea
                id="composer"
                v-model="draft"
                :maxlength="MAX_CHARS"
                rows="2"
                :placeholder="modoEnquete ? 'Escreva a pergunta da enquete' : 'O que quer compartilhar em Libras ou texto?'"
                class="w-full resize-none bg-transparent pt-2 text-[15px] leading-6 text-[#1A1A1A] placeholder:text-gray-500 focus:outline-none"
                @focus="composerFocused = true"
                @blur="composerFocused = false"
                @keydown.ctrl.enter="publish"
                @keydown.meta.enter="publish"
              />

              <!-- PRÉVIA DA MÍDIA -->
              <div v-if="arquivo" class="mt-2">
                <div class="relative inline-block max-w-full">
                  <video v-if="tipoAtual === 'video'" :src="previewUrl" controls class="max-h-64 max-w-full rounded-xl" />
                  <img v-else :src="previewUrl" alt="Prévia da mídia" class="max-h-64 max-w-full rounded-xl" />
                  <button
                    type="button"
                    class="absolute right-2 top-2 flex h-7 w-7 items-center justify-center rounded-full bg-black/60 text-white hover:bg-black/80"
                    aria-label="Remover mídia"
                    @click="removerArquivo"
                  >
                    ×
                  </button>
                </div>
                <p class="mt-1 text-[12px] text-gray-500">{{ arquivo.name }}</p>
              </div>

              <!-- OPÇÕES DA ENQUETE -->
              <div v-if="modoEnquete" class="mt-3 space-y-2">
                <div v-for="(op, i) in opcoes" :key="i" class="flex items-center gap-2">
                  <input
                    v-model="opcoes[i]"
                    type="text"
                    maxlength="80"
                    :placeholder="`Opção ${i + 1}`"
                    class="w-full rounded-lg border border-gray-200 px-3 py-2 text-[14px] focus:border-[#635BFF] focus:outline-none"
                  />
                  <button
                    v-if="opcoes.length > 2"
                    type="button"
                    class="text-gray-500 hover:text-red-600"
                    aria-label="Remover opção"
                    @click="removerOpcao(i)"
                  >
                    ×
                  </button>
                </div>
                <button
                  v-if="opcoes.length < 4"
                  type="button"
                  class="text-[13px] font-semibold text-[#635BFF]"
                  @click="adicionarOpcao"
                >
                  + Adicionar opção
                </button>
              </div>

              <!-- RETORNO DA CRIAÇÃO -->
              <p
                v-if="feedback"
                class="mt-3 rounded-lg px-3 py-2 text-[13px]"
                :class="feedbackOk ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700'"
                role="status"
              >
                {{ feedback }}
              </p>

              <div class="mt-3 flex flex-wrap items-center justify-between gap-3 border-t border-gray-100 pt-3">
                <div class="flex items-center gap-2">
                  <input
                    ref="inputArquivo"
                    type="file"
                    accept="image/jpeg,image/png,image/webp,image/gif,video/mp4,video/webm,video/quicktime"
                    class="hidden"
                    @change="escolherArquivo"
                  />
                  <button
                    type="button"
                    class="flex items-center gap-2 whitespace-nowrap rounded-lg px-3 py-1.5 text-[14px] font-medium transition-colors"
                    :class="arquivo ? 'bg-[#EEEDFF] text-[#635BFF]' : 'text-[#1A1A1A] hover:bg-gray-100'"
                    @click="abrirSeletor"
                  >
                    <svg
                      viewBox="0 0 24 24"
                      class="h-5 w-5"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="1.7"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      aria-hidden="true"
                      v-html="icons.film"
                    />
                    Vídeo / Imagem
                  </button>

                  <button
                    type="button"
                    class="flex items-center gap-2 whitespace-nowrap rounded-lg px-3 py-1.5 text-[14px] font-medium transition-colors"
                    :class="modoEnquete ? 'bg-[#EEEDFF] text-[#635BFF]' : 'text-[#1A1A1A] hover:bg-gray-100'"
                    @click="alternarEnquete"
                  >
                    <svg
                      viewBox="0 0 24 24"
                      class="h-5 w-5"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="1.7"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      aria-hidden="true"
                      v-html="icons.poll"
                    />
                    Enquete
                  </button>
                </div>

                <div class="flex items-center gap-3">
                  <span
                    v-if="draft.length > 0"
                    class="text-[13px] tabular-nums"
                    :class="remaining < 20 ? 'text-red-600' : 'text-gray-500'"
                  >
                    {{ remaining }}
                  </span>

                  <button
                    v-if="draft || arquivo || modoEnquete"
                    type="button"
                    class="whitespace-nowrap rounded-lg px-3 py-2 text-[14px] font-medium text-gray-600 hover:bg-gray-100"
                    @click="cancelar"
                  >
                    Cancelar
                  </button>

                  <button
                    type="button"
                    :disabled="!canPublish"
                    class="whitespace-nowrap rounded-lg bg-[#635BFF] px-5 py-2 text-[14px] font-semibold text-white transition-colors hover:bg-[#5249e6] disabled:cursor-not-allowed disabled:opacity-40"
                    @click="publish"
                  >
                    {{ publicando ? 'Publicando...' : 'Publicar' }}
                  </button>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- POSTS -->
        <p v-if="carregandoFeed" class="py-8 text-center text-[14px] text-gray-500">
          Carregando publicações...
        </p>
        <p v-else-if="erroFeed" class="py-8 text-center text-[14px] text-red-600">
          {{ erroFeed }}
        </p>
        <p v-else-if="posts.length === 0" class="py-8 text-center text-[14px] text-gray-500">
          Ainda não há publicações. Seja o primeiro a compartilhar!
        </p>

        <article
          v-for="post in posts"
          :key="post.id"
          class="mb-5 overflow-hidden rounded-2xl border border-gray-200 bg-white"
        >
          <!-- CABEÇALHO DO POST -->
          <div class="flex items-center gap-3 px-4 min-[980px]:px-5 py-4">
            <img
              v-if="post.foto"
              :src="post.foto"
              class="h-10 w-10 shrink-0 rounded-full object-cover"
              alt=""
            />
            <span
              v-else
              class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#1A1A1A] text-[13px] font-semibold text-white"
            >
              {{ post.initials }}
            </span>

            <div class="min-w-0 flex-1 text-left leading-tight">
              <p class="flex items-center gap-1.5 text-[15px] font-semibold">
                {{ post.user }}
                <span class="font-normal text-gray-500">· {{ post.time }}</span>
              </p>
              <p class="mt-0.5 truncate text-[13px] text-gray-500">{{ post.role }}</p>
            </div>

            <!-- BOTÕES DE EDIÇÃO E EXCLUSÃO -->
            <template v-if="post.own">
              <button
                type="button"
                class="rounded-lg border border-gray-200 px-2.5 py-1.5 min-[980px]:px-3 min-[980px]:py-2 text-[12px] min-[980px]:text-[13px] font-semibold text-[#635BFF] hover:bg-[#EEEDFF] disabled:opacity-50"
                :disabled="postSendoExcluido === post.id || salvandoEdicao"
                @click="postEmEdicao === post.id ? cancelarEdicao() : iniciarEdicao(post)"
              >
                {{ postEmEdicao === post.id ? 'Cancelar' : 'Editar' }}
              </button>

              <button
                type="button"
                class="rounded-lg border border-red-200 px-2.5 py-1.5 min-[980px]:px-3 min-[980px]:py-2 text-[12px] min-[980px]:text-[13px] font-semibold text-red-600 hover:bg-red-50 disabled:opacity-50"
                :disabled="postSendoExcluido === post.id || salvandoEdicao"
                @click="excluirPost(post)"
              >
                {{ postSendoExcluido === post.id ? '...' : 'Excluir' }}
              </button>
            </template>
          </div>

          <!-- EDITAR TEXTO DA PUBLICAÇÃO -->
          <div
            v-if="postEmEdicao === post.id"
            class="mx-4 min-[980px]:mx-5 mb-4 rounded-xl border border-[#635BFF]/30 bg-[#F8F7FF] p-4"
          >
            <label :for="`editar-post-${post.id}`" class="mb-2 block text-[13px] font-semibold text-[#635BFF]">
              Editar publicação
            </label>

            <textarea
              :id="`editar-post-${post.id}`"
              v-model="conteudoEdicao"
              maxlength="280"
              rows="3"
              class="w-full resize-y rounded-lg border border-gray-200 bg-white p-3 text-[14px] leading-6 text-[#1A1A1A] focus:border-[#635BFF] focus:outline-none"
            />

            <div class="mt-3 flex items-center justify-between gap-3">
              <span class="text-[12px] text-gray-500">
                {{ conteudoEdicao.length }}/280
              </span>

              <div class="flex gap-2">
                <button
                  type="button"
                  class="rounded-lg px-3 py-2 text-[13px] font-medium text-gray-600 hover:bg-gray-100"
                  :disabled="salvandoEdicao"
                  @click="cancelarEdicao"
                >
                  Cancelar
                </button>

                <button
                  type="button"
                  class="rounded-lg bg-[#635BFF] px-4 py-2 text-[13px] font-semibold text-white hover:bg-[#5249e6] disabled:opacity-50"
                  :disabled="!conteudoEdicao.trim() || salvandoEdicao"
                  @click="salvarEdicao(post)"
                >
                  {{ salvandoEdicao ? 'Salvando...' : 'Salvar' }}
                </button>
              </div>
            </div>
          </div>

          <!-- MÍDIA -->
          <video
            v-if="postEmEdicao !== post.id && post.tipo === 'video' && post.midiaUrl"
            :src="post.midiaUrl"
            controls
            preload="metadata"
            class="block max-h-130 w-full bg-black object-contain"
          />

          <img
            v-else-if="postEmEdicao !== post.id && (post.tipo === 'imagem' || post.tipo === 'gif') && post.midiaUrl"
            :src="post.midiaUrl"
            :alt="post.caption || 'Imagem publicada'"
            class="block max-h-130 w-full object-cover"
          />

          <!-- ENQUETE -->
          <div
            v-else-if="postEmEdicao !== post.id && post.tipo === 'enquete'"
            class="px-4 min-[980px]:px-5 pb-1 text-left"
          >
            <p class="text-[16px] font-medium leading-7">{{ post.caption }}</p>
            <ul class="mt-3 space-y-2">
              <li
                v-for="op in post.opcoes"
                :key="op.id"
                class="flex items-center justify-between rounded-lg border border-gray-200 px-4 py-2.5 text-[14px]"
              >
                <span>{{ op.texto }}</span>
                <span class="text-[12px] text-gray-500">{{ op.votos }} votos</span>
              </li>
            </ul>
          </div>

          <!-- POST DE TEXTO -->
          <div
            v-else-if="postEmEdicao !== post.id"
            class="px-4 min-[980px]:px-5 pb-1 text-left text-[16px] leading-7"
          >
            {{ post.caption }}
          </div>

          <!-- AÇÕES DO POST -->
          <div class="flex items-center justify-between px-4 min-[980px]:px-5 py-4 text-gray-500">
            <div class="flex items-center gap-6">
              <!-- Curtida -->
              <button
                type="button"
                @click="alternarCurtida(post)"
                :class="post.curtiu ? 'text-pink-600' : 'hover:text-pink-600'"
                class="flex items-center gap-1.5 text-[14px] font-semibold transition-colors group"
              >
                <svg
                  viewBox="0 0 24 24"
                  class="h-6 w-6 fill-none stroke-current"
                  stroke-width="1.8"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  v-html="icons.heart"
                  :style="post.curtiu ? 'fill: currentColor;' : ''"
                />
                {{ post.likes }}
              </button>

              <!-- Comentário -->
              <button
                type="button"
                @click="alternarComentario(post)"
                class="flex items-center gap-1.5 text-[14px] hover:text-[#635BFF] transition-colors group"
              >
                <svg
                  viewBox="0 0 24 24"
                  class="h-6 w-6 fill-none stroke-current"
                  stroke-width="1.8"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  v-html="icons.comment"
                />
                {{ post.comments }}
              </button>
            </div>
          </div>
        </article>
      </main>

      <!-- BARRA LATERAL DIREITA (Apenas Desktop 980px+) -->
      <aside class="hidden min-[980px]:block space-y-5">
        <div class="rounded-2xl border border-gray-200 bg-white p-4">
          <h3 class="text-[16px] font-bold text-[#1A1A1A]">Tendências em Libras</h3>
          <ul class="mt-3 space-y-3">
            <li>
              <p class="text-[14px] font-semibold text-[#635BFF]">#LibrasNoDiaADia</p>
              <p class="text-[12px] text-gray-500">2,4 mil publicações</p>
            </li>
            <li>
              <p class="text-[14px] font-semibold text-[#635BFF]">#CulturaSurda</p>
              <p class="text-[12px] text-gray-500">1,8 mil publicações</p>
            </li>
          </ul>
        </div>
      </aside>
    </div>
  </div>
</template>