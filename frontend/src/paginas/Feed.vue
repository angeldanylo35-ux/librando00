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

// Mesmos nomes de antes, então o template que usa {{ nome }} e {{ nomeUsuario }} não muda
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
    // sem conexão: mantém o nome e o @ que já estavam salvos no navegador
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

const suggestions = [
  { name: 'Bia Santos', handle: '@bia.sinais', note: 'Seguida por Ana Clara', initials: 'BS' },
  { name: 'Pedro Oliveira', handle: '@pedro.emlibras', note: 'Educador de Libras', initials: 'PO' },
  { name: 'Júlia Mendes', handle: '@julia.sinaliza', note: 'Novo no Librando', initials: 'JM' },
  { name: 'Rafael Lima', handle: '@rafa.libras', note: 'Criador de conteúdo', initials: 'RL' },
]

const trending = [
  { tag: '#LibrasNoDiaADia', count: '2,4 mil vídeos' },
  { tag: '#CulturaSurda', count: '1,8 mil vídeos' },
  { tag: '#AprendaLibras', count: '956 vídeos' },
]

const footerLinks = ['Sobre', 'Acessibilidade', 'Ajuda', 'Privacidade', 'Termos', 'Diretrizes da comunidade']

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

function alternarRepost(post) {
  post.repostou = !post.repostou
  post.repostou ? post.reposts++ : post.reposts--

  localStorage.setItem('librando_reacoes', JSON.stringify({
    repostou: post.repostou,
    totalReposts: post.reposts,
    curtiu: post.curtiu,
    totalCurtidas: post.likes,
    comentou: post.comentou,
    totalComentarios: post.comments,
    salvou: post.salvou
  }))
}

function enviarPost() {
  // Mantido neutro
}

function alternarSalvar(post) {
  post.salvou = !post.salvou
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
    feedbackPost.value =
      erro.response?.data?.mensagem ||
      'Não foi possível atualizar a publicação. Verifique se a API de edição já está disponível.'
  } finally {
    salvandoEdicao.value = false
  }
}

async function excluirPost(post) {
  if (!post.own || postSendoExcluido.value !== null) return

  const confirmar = window.confirm(
    'Tem certeza de que deseja excluir esta publicação? Essa ação não pode ser desfeita.',
  )

  if (!confirmar) return

  postSendoExcluido.value = post.id
  feedbackPost.value = ''

  try {
    const { data } = await api.delete(`/posts/${post.id}`)

    posts.value = posts.value.filter((item) => item.id !== post.id)

    if (postEmEdicao.value === post.id) {
      cancelarEdicao()
    }

    feedbackPostOk.value = true
    feedbackPost.value = data.mensagem || 'Publicação excluída com sucesso.'
  } catch (erro) {
    if (tratarErroAuth(erro)) return

    feedbackPostOk.value = false
    feedbackPost.value =
      erro.response?.data?.mensagem ||
      'Não foi possível excluir a publicação. Verifique se a API de exclusão já está disponível.'
  } finally {
    postSendoExcluido.value = null
  }
}

function navegarPara(route) {
  if (route) {
    router.push(route)
  }
}

onMounted(async () => {
  // Carrega o perfil antes dos posts para marcar corretamente quais são seus
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

  if (inputArquivo.value) {
    inputArquivo.value.value = ''
  }
}

function alternarEnquete() {
  modoEnquete.value = !modoEnquete.value

  if (modoEnquete.value) {
    removerArquivo()
  }
}

function adicionarOpcao() {
  if (opcoes.value.length < 4) {
    opcoes.value.push('')
  }
}

function removerOpcao(i) {
  if (opcoes.value.length > 2) {
    opcoes.value.splice(i, 1)
  }
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
    opcoes.value
      .map((o) => o.trim())
      .filter(Boolean)
      .forEach((o) => form.append('opcoes[]', o))
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
    feedback.value =
      erro.response?.data?.mensagem ??
      'Não foi possível realizar a publicação. Tente novamente.'
  } finally {
    publicando.value = false
  }
}
</script>

<template>
  <div class="min-h-screen bg-[#F8F9FA] pl-56 text-left font-sans text-[#1A1A1A] antialiased">
    <!-- SIDEBAR -->
    <aside class="fixed inset-y-0 left-0 z-20 flex w-56 flex-col border-r border-gray-200 bg-white px-4 py-8">
      <div class="px-1">
        <h1 class="text-[32px] font-extrabold leading-none tracking-tight" style="color: #635BFF !important;">
          Librando.
        </h1>
        <p class="mt-1.5 text-[11px] font-medium tracking-wide" style="color: #1A1A1A !important;">
          CONEXÕES EM LIBRAS
        </p>
      </div>

      <nav class="mt-8 flex flex-col gap-1" aria-label="Principal">
        <button
          v-for="item in navItems"
          :key="item.label"
          type="button"
          class="flex items-center gap-4 rounded-lg px-3 py-3 text-left text-[16px] transition-colors"
          :class="item.active ? 'bg-[#EEEDFF] font-medium text-[#635BFF]' : 'text-[#1A1A1A] hover:bg-gray-50'"
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
          <span>{{ item.label }}</span>
          <span
            v-if="item.badge"
            class="ml-1 flex h-5.5 min-w-5.5 items-center justify-center rounded-full bg-[#635BFF] px-1.5 text-[12px] font-semibold text-white"
          >
            {{ item.badge }}
          </span>
        </button>

        <button
          type="button"
          class="mt-3 flex items-center justify-center gap-3 rounded-lg border border-gray-200 bg-white px-3 py-3 text-[15px] font-semibold text-[#1A1A1A] transition-colors hover:bg-gray-50"
        >
          <svg
            viewBox="0 0 24 24"
            class="h-6 w-6"
            fill="none"
            stroke="currentColor"
            stroke-width="1.7"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true"
            v-html="icons.plus"
          />
          Criar vídeo
        </button>
      </nav>

      <div class="mt-auto">
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
            <svg
              viewBox="0 0 24 24"
              class="h-4 w-4 text-[#1A1A1A]"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              aria-hidden="true"
            >
              <path d="m8 9 4-4 4 4M8 15l4 4 4-4" />
            </svg>
          </button>
        </div>
      </div>
    </aside>

    <!-- CONTEÚDO -->
    <div class="mx-auto grid max-w-285 grid-cols-1 justify-center gap-12 px-8 py-8 lg:grid-cols-[minmax(0,720px)_minmax(0,320px)]">
      <main class="min-w-0">
        <header class="mb-5 flex items-end justify-between">
          <h2
            class="text-[24px] font-bold tracking-tight"
            style="color: #1A1A1A !important; -webkit-text-fill-color: #1A1A1A !important; opacity: 1 !important; visibility: visible !important;"
          >
            Seu mundo em Libras.
          </h2>

          <div class="flex gap-6 text-[14px]" role="tablist">
            <button
              v-for="tab in tabs"
              :key="tab"
              type="button"
              role="tab"
              :aria-selected="activeTab === tab"
              class="border-b-2 pb-1.5 transition-colors"
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
          <div class="flex items-center gap-3 px-5 py-4">
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

            <button
              v-if="!post.own"
              type="button"
              class="rounded-lg bg-[#635BFF] px-5 py-2 text-[14px] font-semibold text-white hover:bg-[#5249e6]"
            >
              Seguir
            </button>

            <!-- BOTÕES DE EDIÇÃO E EXCLUSÃO: SOMENTE POSTS DO USUÁRIO -->
            <template v-if="post.own">
              <button
                type="button"
                class="rounded-lg border border-gray-200 px-3 py-2 text-[13px] font-semibold text-[#635BFF] hover:bg-[#EEEDFF] disabled:opacity-50"
                :disabled="postSendoExcluido === post.id || salvandoEdicao"
                @click="postEmEdicao === post.id ? cancelarEdicao() : iniciarEdicao(post)"
              >
                {{ postEmEdicao === post.id ? 'Cancelar edição' : 'Editar' }}
              </button>

              <button
                type="button"
                class="rounded-lg border border-red-200 px-3 py-2 text-[13px] font-semibold text-red-600 hover:bg-red-50 disabled:opacity-50"
                :disabled="postSendoExcluido === post.id || salvandoEdicao"
                @click="excluirPost(post)"
              >
                {{ postSendoExcluido === post.id ? 'Excluindo...' : 'Excluir' }}
              </button>
            </template>

            <button
              type="button"
              class="rounded-full p-2 text-[#1A1A1A] hover:bg-gray-100"
              aria-label="Mais opções"
            >
              <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor" aria-hidden="true" v-html="icons.more" />
            </button>
          </div>

          <!-- EDITAR TEXTO DA PUBLICAÇÃO -->
          <div
            v-if="postEmEdicao === post.id"
            class="mx-5 mb-4 rounded-xl border border-[#635BFF]/30 bg-[#F8F7FF] p-4"
          >
            <label :for="`editar-post-${post.id}`" class="mb-2 block text-[13px] font-semibold text-[#635BFF]">
              Editar publicação
            </label>

            <textarea
              :id="`editar-post-${post.id}`"
              v-model="conteudoEdicao"
              maxlength="280"
              rows="3"
              class="w-full resize-y rounded-lg border border-gray-200 bg-white p-3 text-[14px] leading-6 text-[#1A1A1A] focus:border-[#635BFF] focus:outline-none focus:ring-2 focus:ring-[#635BFF]/20"
              placeholder="Atualize o texto da sua publicação..."
            />

            <div class="mt-3 flex items-center justify-between gap-3">
              <span class="text-[12px] text-gray-500">
                {{ conteudoEdicao.length }}/280 caracteres
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
                  class="rounded-lg bg-[#635BFF] px-4 py-2 text-[13px] font-semibold text-white hover:bg-[#5249e6] disabled:cursor-not-allowed disabled:opacity-50"
                  :disabled="!conteudoEdicao.trim() || salvandoEdicao"
                  @click="salvarEdicao(post)"
                >
                  {{ salvandoEdicao ? 'Salvando...' : 'Salvar alterações' }}
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
            class="px-5 pb-1 text-left"
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
            class="px-5 pb-1 text-left text-[16px] leading-7"
          >
            {{ post.caption }}
          </div>

          <!-- AÇÕES DO POST -->
          <div class="flex items-center justify-between px-5 pt-4 text-gray-500">
            <div class="flex items-center gap-6">
              <!-- 1. Curtida -->
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
                  aria-hidden="true"
                  v-html="icons.heart"
                  :style="post.curtiu ? 'fill: currentColor;' : ''"
                />
                {{ post.likes }}
              </button>

              <!-- 2. Comentário -->
              <button
                type="button"
                @click="alternarComentario(post)"
                :class="post.comentou ? 'text-[#635BFF]' : 'hover:text-[#635BFF]'"
                class="flex items-center gap-1.5 text-[14px] transition-colors group"
              >
                <svg
                  viewBox="0 0 24 24"
                  class="h-6 w-6 fill-none stroke-current"
                  stroke-width="1.8"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  aria-hidden="true"
                  v-html="icons.comment"
                />
                {{ post.comments }}
              </button>

              <!-- 3. Repost -->
              <button
                type="button"
                @click="alternarRepost(post)"
                :class="post.repostou ? 'text-green-600' : 'hover:text-green-600'"
                class="flex items-center gap-1.5 text-[14px] transition-colors group"
                aria-label="Repostar"
              >
                <svg
                  viewBox="0 0 24 24"
                  class="h-6 w-6 fill-none stroke-current"
                  stroke-width="1.8"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  aria-hidden="true"
                  v-html="icons.repost"
                />
                {{ post.reposts }}
              </button>

              <!-- 4. Enviar -->
              <button
                type="button"
                @click="enviarPost"
                class="hover:text-[#635BFF] transition-colors flex items-center gap-1.5"
                aria-label="Compartilhar"
              >
                <svg
                  viewBox="0 0 24 24"
                  class="h-6 w-6 fill-none stroke-current"
                  stroke-width="1.8"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  aria-hidden="true"
                  v-html="icons.send"
                />
              </button>
            </div>

            <!-- 5. Salvar -->
            <button
              type="button"
              @click="alternarSalvar(post)"
              :class="post.salvou ? 'text-[#635BFF]' : 'hover:text-[#635BFF]'"
              class="transition-colors p-1"
              aria-label="Salvar"
            >
              <svg
                viewBox="0 0 24 24"
                class="h-6 w-6 fill-none stroke-current"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
                v-html="icons.bookmark"
                :style="post.salvou ? 'fill: currentColor;' : ''"
              />
            </button>
          </div>

          <!-- LEGENDA E COMENTÁRIOS -->
          <div class="px-5 pb-4 pt-3 text-left text-[14px]">
            <p v-if="postEmEdicao !== post.id && post.midiaUrl && post.caption">
              <span class="mr-1.5 font-semibold">{{ post.user }}</span>{{ post.caption }}
            </p>

            <div class="mt-3 flex items-center gap-3 border-t border-gray-200 pt-3">
              <svg
                viewBox="0 0 24 24"
                class="h-5 w-5"
                fill="none"
                stroke="currentColor"
                stroke-width="1.7"
                stroke-linecap="round"
                aria-hidden="true"
                v-html="icons.smile"
              />
              <span class="flex-1 text-[13px] text-gray-500">Adicione um comentário...</span>
              <button type="button" class="text-[13px] font-semibold text-[#635BFF]">
                Publicar
              </button>
            </div>
          </div>
        </article>

        <!-- MENSAGEM DE RETORNO DA EDIÇÃO OU EXCLUSÃO -->
        <p
          v-if="feedbackPost"
          class="mb-5 rounded-xl px-4 py-3 text-[14px]"
          :class="feedbackPostOk ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700'"
          role="status"
        >
          {{ feedbackPost }}
          <button
            type="button"
            class="ml-2 font-semibold underline"
            aria-label="Fechar mensagem"
            @click="feedbackPost = ''"
          >
            Fechar
          </button>
        </p>
      </main>

      <!-- COLUNA DIREITA -->
      <aside class="sticky top-8 hidden h-fit self-start lg:block">
        <!-- PESQUISA -->
        <div class="flex items-center gap-3 rounded-xl border border-gray-200 bg-white px-4 py-3">
          <svg
            viewBox="0 0 24 24"
            class="h-5 w-5"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
            aria-hidden="true"
            v-html="icons.search"
          />
          <input
            type="text"
            placeholder="Pesquisar no Librando"
            class="w-full bg-transparent text-[14px] placeholder:text-gray-500 focus:outline-none"
            aria-label="Pesquisar no Librando"
          />
        </div>

        <!-- PERFIL ATUAL -->
        <div class="mt-6 flex items-center gap-3">
          <img
            v-if="perfil.foto_perfil_url"
            :src="perfil.foto_perfil_url"
            class="h-12 w-12 rounded-full object-cover"
            alt=""
          />
          <span
            v-else
            class="flex h-12 w-12 items-center justify-center rounded-full bg-[#1A1A1A] text-[14px] font-semibold text-white"
          >
            {{ meuInicial }}
          </span>
          <div class="min-w-0 flex-1 leading-tight">
            <p class="text-[14px] font-medium">{{ nomeUsuario }}</p>
            <p class="mt-0.5 text-[13px] text-gray-500">{{ nome }}</p>
          </div>
          <button type="button" class="text-[12px] font-semibold text-[#635BFF]">
            Trocar
          </button>
        </div>

        <!-- SUGESTÕES -->
        <div class="mt-6 flex items-center justify-between">
          <h3 class="text-[14px] text-gray-700">Sugestões para você</h3>
          <button type="button" class="text-[12px] font-semibold text-[#635BFF]">
            Ver todos
          </button>
        </div>

        <ul class="mt-4 space-y-4">
          <li v-for="s in suggestions" :key="s.handle" class="flex items-center gap-3">
            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gray-700 text-[12px] font-semibold text-white">
              {{ s.initials }}
            </span>
            <div class="min-w-0 flex-1 leading-tight">
              <p class="truncate text-[13px] font-medium">{{ s.name }}</p>
              <p class="mt-0.5 truncate text-[12px] text-gray-500">{{ s.handle }}</p>
              <p class="mt-0.5 truncate text-[11px] text-gray-500">{{ s.note }}</p>
            </div>
            <button
              type="button"
              class="rounded-lg bg-[#635BFF] px-4 py-2 text-[13px] font-semibold text-white hover:bg-[#5249e6]"
            >
              Seguir
            </button>
          </li>
        </ul>

        <!-- EM ALTA -->
        <div class="mt-6 border-t border-gray-200 pt-6">
          <h3 class="text-[14px] text-gray-700">Em alta na comunidade</h3>
          <ul class="mt-4 space-y-3">
            <li v-for="t in trending" :key="t.tag">
              <button type="button" class="flex w-full items-center gap-3 text-left">
                <span class="flex h-10 w-10 items-center justify-center rounded-lg border border-gray-200 bg-white text-[#635BFF]">
                  <svg
                    viewBox="0 0 24 24"
                    class="h-5 w-5"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    aria-hidden="true"
                    v-html="icons.hash"
                  />
                </span>
                <span class="flex-1 leading-tight">
                  <span class="block text-[13px] font-semibold">{{ t.tag }}</span>
                  <span class="mt-0.5 block text-[12px] text-gray-500">{{ t.count }}</span>
                </span>
                <svg
                  viewBox="0 0 24 24"
                  class="h-4 w-4"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  aria-hidden="true"
                  v-html="icons.chevron"
                />
              </button>
            </li>
          </ul>
        </div>

        <!-- BOAS-VINDAS -->
        <div class="mt-6 rounded-2xl border border-gray-200 bg-white p-5">
          <svg
            viewBox="0 0 24 24"
            class="h-7 w-7 text-[#635BFF]"
            fill="none"
            stroke="currentColor"
            stroke-width="1.7"
            stroke-linecap="round"
            stroke-linejoin="round"
            aria-hidden="true"
            v-html="icons.hand"
          />
          <h3 class="mt-3 text-[16px] font-medium">Cada sinal aproxima.</h3>
          <p class="mt-2 text-[13px] leading-5 text-gray-500">
            Um espaço para compartilhar, aprender e se conectar em Libras. Do seu jeito.
          </p>
          <a
            href="#"
            class="mt-4 inline-flex items-center gap-1.5 text-[13px] font-semibold text-[#635BFF]"
            @click.prevent
          >
            Conheça o Librando
            <svg
              viewBox="0 0 24 24"
              class="h-3.5 w-3.5"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              aria-hidden="true"
              v-html="icons.arrowUp"
            />
          </a>
        </div>

        <!-- RODAPÉ -->
        <nav class="mt-6 flex flex-wrap gap-x-1.5 gap-y-1 text-[11px] text-gray-500" aria-label="Rodapé">
          <template v-for="(link, i) in footerLinks" :key="link">
            <a href="#" class="hover:underline" @click.prevent>{{ link }}</a>
            <span v-if="i < footerLinks.length - 1" aria-hidden="true">·</span>
          </template>
        </nav>
        <p class="mt-3 text-[11px] text-gray-500">© 2026 LIBRANDO</p>
      </aside>
    </div>
  </div>
</template>