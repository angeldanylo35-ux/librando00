<script setup>
import { ref, computed, onMounted, onBeforeUnmount, reactive } from 'vue'
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
  menu: '<path d="M4 6h16M4 12h16M4 18h16"/>',
  logout: '<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>'
}

const navItems = [
  { label: 'Página inicial', icon: 'home', route: '/feed' },
  { label: 'Explorar', icon: 'explore' },
  { label: 'Vídeos', icon: 'video' },
  { label: 'Mensagens', icon: 'send', badge: 3 },
  { label: 'Notificações', icon: 'heart' },
  { label: 'Salvos', icon: 'bookmark' },
  { label: 'Meu perfil', icon: 'user', route: '/perfil', active: true },
  { label: 'Mais', icon: 'menu' }
]

const abaAtiva = ref('publicacoes')
const mensagemErro = ref('')
const excluindoConta = ref(false)

/* ---------- Perfil (vem do banco: GET /perfil) ---------- */
const dados = ref({
  id: null,
  nome: localStorage.getItem('nome') || '',
  nome_usuario: localStorage.getItem('nome_usuario') || '',
  bio: '',
  localizacao: '',
  foto_perfil_url: '',
  foto_capa_url: '',
})

const iniciais = computed(() => {
  const partes = (dados.value.nome || dados.value.nome_usuario || '?').trim().split(/\s+/)
  return (partes[0][0] + (partes[1]?.[0] ?? '')).toUpperCase()
})

function tratarErroAuth(e) {
  if (e.response?.status === 401) {
    localStorage.removeItem('token')
    router.push('/login')
    return true
  }
  return false
}

function guardarNoNavegador(perfil) {
  localStorage.setItem('nome', perfil.nome)
  localStorage.setItem('nome_usuario', perfil.nome_usuario)
}

function sair() {
  localStorage.removeItem('token')
  localStorage.removeItem('nome')
  localStorage.removeItem('nome_usuario')
  router.replace('/login')
}

async function carregar() {
  try {
    const { data } = await api.get('/perfil')
    dados.value = data.perfil
    guardarNoNavegador(data.perfil)
  } catch (e) {
    if (tratarErroAuth(e)) return
    mensagemErro.value = e.response?.data?.mensagem ?? 'Não foi possível carregar o perfil.'
  }
}

async function excluirConta() {
  const confirmado = window.confirm(
    'Tem certeza absoluta de que deseja excluir a sua conta? Esta ação é permanente e não poderá ser desfeita.'
  )
  if (!confirmado || excluindoConta.value) return

  excluindoConta.value = true
  mensagemErro.value = ''

  try {
    await api.delete('/conta')
    localStorage.removeItem('token')
    localStorage.removeItem('nome')
    localStorage.removeItem('nome_usuario')
    router.replace('/login')
  } catch (e) {
    if (tratarErroAuth(e)) return
    mensagemErro.value = e.response?.data?.mensagem ?? 'Não foi possível excluir a conta. Tente novamente.'
    alert(mensagemErro.value)
  } finally {
    excluindoConta.value = false
  }
}

/* ---------- Posts do próprio usuário (GET /posts) ---------- */
const posts = ref([])
const carregandoPosts = ref(true)

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
    texto: p.conteudo || '',
    midia: p.midia_url,
    tempo: tempo(p.criado_em),
    curtidas: 0,
    comentarios: 0,
    reposts: 0,
    curtiu: false,
    comentou: false,
    repostou: false,
    salvou: false,
  }
}

async function carregarPosts() {
  carregandoPosts.value = true
  try {
    const { data } = await api.get('/posts')
    posts.value = data.posts
      .filter((p) => p.usuario.nome_usuario === dados.value.nome_usuario)
      .map(mapearPost)
  } catch (e) {
    if (tratarErroAuth(e)) return
  } finally {
    carregandoPosts.value = false
  }
}

function alternarReacao(post, flag, contador) {
  post[flag] = !post[flag]
  post[contador] += post[flag] ? 1 : -1
}

/* ---------- Criar post ---------- */
const novoPostTexto = ref('')
const novoPostArquivo = ref(null)
const inputPostArquivo = ref(null)
const publicando = ref(false)

function escolherArquivoPost(event) {
  novoPostArquivo.value = event.target.files[0] ?? null
}

async function criarPost() {
  const texto = novoPostTexto.value.trim()
  if ((!texto && !novoPostArquivo.value) || publicando.value) return

  publicando.value = true
  const mime = novoPostArquivo.value?.type ?? ''
  const tipo = mime === 'image/gif' ? 'gif' : mime.startsWith('image/') ? 'imagem' : mime.startsWith('video/') ? 'video' : 'texto'

  const form = new FormData()
  form.append('tipo', tipo)
  form.append('conteudo', texto)
  if (novoPostArquivo.value) form.append('midia', novoPostArquivo.value)

  try {
    const { data } = await api.post('/posts', form, {
      headers: { 'Content-Type': 'multipart/form-data' },
    })
    posts.value.unshift(mapearPost(data.post))
    novoPostTexto.value = ''
    novoPostArquivo.value = null
    if (inputPostArquivo.value) inputPostArquivo.value.value = ''
  } catch (e) {
    if (tratarErroAuth(e)) return
    alert(e.response?.data?.mensagem ?? 'Não foi possível publicar.')
  } finally {
    publicando.value = false
  }
}

/* ---------- Menu, edição e exclusão de post ---------- */
const menuPostAbertoId = ref(null)
function alternarMenuPost(id) {
  menuPostAbertoId.value = menuPostAbertoId.value === id ? null : id
}

const modalEditarPostAberta = ref(false)
const postSendoEditado = ref(null)
const textoPostEditando = ref('')

function abrirModalEditarPost(post) {
  postSendoEditado.value = post
  textoPostEditando.value = post.texto
  modalEditarPostAberta.value = true
  menuPostAbertoId.value = null
}

async function salvarEdicaoPost() {
  const conteudo = textoPostEditando.value.trim()
  if (!postSendoEditado.value || !conteudo) return

  try {
    await api.put(`/posts/${postSendoEditado.value.id}`, { conteudo })
    postSendoEditado.value.texto = conteudo
    modalEditarPostAberta.value = false
  } catch (e) {
    if (tratarErroAuth(e)) return
    alert(e.response?.data?.mensagem ?? 'Não foi possível atualizar a publicação.')
  }
}

async function excluirPost(post) {
  menuPostAbertoId.value = null
  if (!window.confirm('Tem certeza de que deseja excluir esta publicação?')) return

  try {
    await api.delete(`/posts/${post.id}`)
    posts.value = posts.value.filter((p) => p.id !== post.id)
  } catch (e) {
    if (tratarErroAuth(e)) return
    alert(e.response?.data?.mensagem ?? 'Não foi possível excluir a publicação.')
  }
}

/* ---------- Modal de edição do perfil ---------- */
const modalEdicaoAberta = ref(false)
const salvandoPerfil = ref(false)
const formEdicao = reactive({ nome: '', nome_usuario: '', bio: '', localizacao: '' })

const inputCapa = ref(null)
const inputFoto = ref(null)
const arquivoCapa = ref(null)
const arquivoFoto = ref(null)
const previewCapa = ref('')
const previewFoto = ref('')

function limparPreviews() {
  if (previewCapa.value) URL.revokeObjectURL(previewCapa.value)
  if (previewFoto.value) URL.revokeObjectURL(previewFoto.value)
  previewCapa.value = ''
  previewFoto.value = ''
  arquivoCapa.value = null
  arquivoFoto.value = null
}

function escolherImagem(event, qual) {
  const arquivo = event.target.files[0]
  if (!arquivo) return

  if (qual === 'capa') {
    if (previewCapa.value) URL.revokeObjectURL(previewCapa.value)
    arquivoCapa.value = arquivo
    previewCapa.value = URL.createObjectURL(arquivo)
  } else {
    if (previewFoto.value) URL.revokeObjectURL(previewFoto.value)
    arquivoFoto.value = arquivo
    previewFoto.value = URL.createObjectURL(arquivo)
  }
}

function abrirModalEdicao() {
  mensagemErro.value = ''
  limparPreviews()
  formEdicao.nome = dados.value.nome
  formEdicao.nome_usuario = dados.value.nome_usuario
  formEdicao.bio = dados.value.bio || ''
  formEdicao.localizacao = dados.value.localizacao || ''
  modalEdicaoAberta.value = true
}

function fecharModalEdicao() {
  limparPreviews()
  modalEdicaoAberta.value = false
}

async function salvarPerfil() {
  if (!formEdicao.nome.trim()) {
    mensagemErro.value = 'O campo Nome é obrigatório.'
    return
  }
  if (!formEdicao.nome_usuario.trim()) {
    mensagemErro.value = 'O campo Nome de utilizador (@) é obrigatório.'
    return
  }

  salvandoPerfil.value = true
  mensagemErro.value = ''

  const form = new FormData()
  form.append('nome', formEdicao.nome.trim())
  form.append('nome_usuario', formEdicao.nome_usuario.trim().replace(/^@/, ''))
  form.append('bio', formEdicao.bio ?? '')
  form.append('localizacao', formEdicao.localizacao ?? '')
  if (arquivoFoto.value) form.append('foto_perfil', arquivoFoto.value)
  if (arquivoCapa.value) form.append('foto_capa', arquivoCapa.value)

  try {
    const { data } = await api.post('/perfil', form, {
      headers: { 'Content-Type': 'multipart/form-data' },
    })
    dados.value = data.perfil
    guardarNoNavegador(data.perfil)
    limparPreviews()
    modalEdicaoAberta.value = false
  } catch (e) {
    if (tratarErroAuth(e)) return
    mensagemErro.value = e.response?.data?.mensagem ?? 'Não foi possível salvar o perfil.'
  } finally {
    salvandoPerfil.value = false
  }
}

function navegarPara(route) {
  if (route) router.push(route)
}

onMounted(async () => {
  await carregar()
  carregarPosts()
})

onBeforeUnmount(limparPreviews)
</script>

<template>
  <div class="perfil-page min-h-screen bg-[#F8F9FA] pl-0 min-[980px]:pl-56 text-left font-sans text-slate-900 pb-24 min-[980px]:pb-0">
    <div class="mx-auto max-w-[1280px] flex justify-center">

      <!-- ESQUERDA: Sidebar / Barra inferior no mobile -->
      <aside class="fixed inset-x-0 bottom-0 z-25 flex flex-row justify-around items-center border-t border-gray-200 bg-white px-2 py-3 min-[980px]:inset-y-0 min-[980px]:left-0 min-[980px]:w-56 min-[980px]:flex-col min-[980px]:justify-start min-[980px]:px-4 min-[980px]:py-8 min-[980px]:border-r min-[980px]:border-t-0">
        <div class="w-full flex flex-col h-full justify-between">
          <div>
            <!-- Logo (Apenas Desktop 980px+) -->
            <div class="hidden min-[980px]:block px-1 mb-6 text-left">
              <h1 class="brand-logo text-3xl font-extrabold leading-none">Librando.</h1>
              <p class="text-[10px] text-gray-500 font-bold tracking-wider mt-1">CONEXÕES EM LIBRAS</p>
            </div>

            <!-- Navegação com destaque correto na aba ativa -->
            <nav class="flex w-full flex-row justify-around items-center min-[980px]:space-y-1 min-[980px]:flex-col min-[980px]:items-stretch" aria-label="Principal">
              <button
                v-for="item in navItems"
                :key="item.label"
                type="button"
                class="relative flex items-center justify-center gap-2 rounded-lg p-2.5 min-[980px]:px-3 min-[980px]:py-3 min-[980px]:justify-start min-[980px]:text-[16px] transition-colors"
                :class="item.active ? 'text-[#635BFF] font-bold min-[980px]:bg-purple-50' : 'text-gray-700 hover:bg-gray-100'"
                @click="navegarPara(item.route)"
              >
                <svg
                  viewBox="0 0 24 24"
                  class="w-6 h-6 stroke-current fill-none shrink-0"
                  stroke-width="1.7"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  aria-hidden="true"
                  v-html="icons[item.icon]"
                />
                <span class="hidden min-[980px]:inline">{{ item.label }}</span>
                <!-- Badge de notificação -->
                <span
                  v-if="item.badge"
                  class="absolute top-1 right-1.5 min-[980px]:static min-[980px]:ml-auto flex h-4 w-4 min-[980px]:h-5.5 min-[980px]:min-w-5.5 items-center justify-center rounded-full bg-[#635BFF] text-[10px] min-[980px]:text-[12px] font-semibold text-white"
                >
                  {{ item.badge }}
                </span>
              </button>
            </nav>
          </div>

          <!-- Botão Sair na sidebar do Desktop -->
          <div class="hidden min-[980px]:block mt-auto pt-4 border-t border-gray-200">
            <button
              type="button"
              class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-left text-red-600 hover:bg-red-50 transition-colors font-medium text-[15px]"
              @click="sair"
            >
              <svg viewBox="0 0 24 24" class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" v-html="icons.logout" />
              <span>Sair</span>
            </button>
          </div>
        </div>
      </aside>

      <!-- CENTRO -->
      <main class="w-full min-[980px]:flex-1 min-[980px]:max-w-[720px] xl:max-w-[800px] border-r border-gray-200 bg-white min-h-screen text-left">

        <!-- Topo com Logo Centralizado no modo responsivo -->
        <header class="grid grid-cols-3 items-center px-4 py-3 sticky top-0 bg-white/90 backdrop-blur-md z-10 border-b border-gray-100">
          <!-- Esquerda: Seta e Info -->
          <div class="flex items-center gap-2">
            <router-link to="/feed" class="text-gray-700 text-lg p-1.5 hover:bg-gray-100 rounded-full flex items-center justify-center shrink-0">←</router-link>
            <div class="min-w-0">
              <h2 class="title-dark font-bold text-sm min-[980px]:text-lg leading-tight truncate">{{ dados.nome || dados.nome_usuario }}</h2>
              <p class="text-[11px] min-[980px]:text-xs text-gray-500 truncate">{{ posts.length }} publicações</p>
            </div>
          </div>

          <!-- Centro: Logo Librando (Exibido minimizado) -->
          <div class="text-center min-[980px]:hidden">
            <h1 class="text-[20px] font-extrabold leading-none" style="color: #635BFF !important;">
              Librando.
            </h1>
          </div>

          <!-- Direita: Reservado para simetria -->
          <div></div>
        </header>

        <!-- Capa e foto -->
        <div class="relative">
          <div class="h-32 sm:h-40 bg-gray-200 w-full overflow-hidden">
            <img v-if="dados.foto_capa_url" :src="dados.foto_capa_url" class="w-full h-full object-cover" alt="Capa" />
          </div>

          <div class="flex justify-end items-center gap-2 p-4">
            <button
              @click="abrirModalEdicao"
              class="px-4 py-1.5 border border-gray-800 text-gray-800 rounded-full font-bold text-sm hover:bg-gray-100 transition-colors"
            >
              Editar perfil
            </button>
          </div>

          <div class="absolute -bottom-10 left-4">
            <img
              v-if="dados.foto_perfil_url"
              :src="dados.foto_perfil_url"
              class="w-24 h-24 sm:w-28 sm:h-28 rounded-full border-4 border-white object-cover shadow-md"
              alt="Foto de perfil"
            />
            <div
              v-else
              class="w-24 h-24 sm:w-28 sm:h-28 rounded-full border-4 border-white bg-[#1A1A1A] text-white text-2xl sm:text-3xl font-semibold flex items-center justify-center shadow-md"
            >
              {{ iniciais }}
            </div>
          </div>
        </div>

        <!-- Detalhes -->
        <div class="px-4 mt-12 text-left">
          <h1 class="title-dark text-xl sm:text-2xl font-extrabold">{{ dados.nome || dados.nome_usuario }}</h1>
          <p class="text-sm text-gray-500">@{{ dados.nome_usuario }}</p>
          <p v-if="dados.bio" class="text-sm mt-3 text-gray-800 leading-normal">{{ dados.bio }}</p>
          <p v-if="dados.localizacao" class="text-xs text-gray-500 mt-3">📍 {{ dados.localizacao }}</p>

          <!-- Botão de Excluir Conta -->
          <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
            <span class="text-xs text-gray-500">Gerenciamento da conta</span>
            <button
              type="button"
              :disabled="excluindoConta"
              class="px-4 py-1.5 border border-red-200 text-red-600 rounded-full font-bold text-sm hover:bg-red-50 transition-colors disabled:opacity-50"
              @click="excluirConta"
            >
              {{ excluindoConta ? 'Excluindo...' : 'Excluir minha conta' }}
            </button>
          </div>
        </div>

        <!-- Abas -->
        <div class="flex border-b border-gray-200 mt-4 text-sm font-semibold text-gray-500">
          <button @click="abaAtiva = 'publicacoes'" :class="abaAtiva === 'publicacoes' ? 'text-gray-900 border-b-2 border-[#635BFF]' : 'hover:bg-gray-50'" class="flex-1 py-3 text-center transition-colors">Publicações</button>
          <button @click="abaAtiva = 'reposts'" :class="abaAtiva === 'reposts' ? 'text-gray-900 border-b-2 border-[#635BFF]' : 'hover:bg-gray-50'" class="flex-1 py-3 text-center transition-colors">Repost</button>
          <button @click="abaAtiva = 'curtidas'" :class="abaAtiva === 'curtidas' ? 'text-gray-900 border-b-2 border-[#635BFF]' : 'hover:bg-gray-50'" class="flex-1 py-3 text-center transition-colors">Curtidas</button>
        </div>

        <!-- ABA PUBLICAÇÕES -->
        <div v-if="abaAtiva === 'publicacoes'" class="divide-y divide-gray-100">
          <!-- Criar post -->
          <div class="p-4 border-b border-gray-100 bg-gray-50/50">
            <div class="flex gap-3">
              <img v-if="dados.foto_perfil_url" :src="dados.foto_perfil_url" class="w-10 h-10 rounded-full object-cover shrink-0" alt="" />
              <div v-else class="w-10 h-10 rounded-full bg-[#1A1A1A] text-white text-xs font-semibold flex items-center justify-center shrink-0">{{ iniciais }}</div>

              <div class="flex-1 space-y-2">
                <textarea
                  v-model="novoPostTexto"
                  rows="2"
                  maxlength="280"
                  placeholder="O que você deseja compartilhar em Libras hoje?"
                  class="w-full bg-white border border-gray-200 rounded-xl p-3 text-sm focus:outline-none focus:border-[#635BFF]"
                ></textarea>

                <p v-if="novoPostArquivo" class="text-xs text-gray-500">{{ novoPostArquivo.name }}</p>

                <div class="flex flex-wrap items-center justify-between gap-2">
                  <input ref="inputPostArquivo" type="file" accept="image/jpeg,image/png,image/webp,image/gif,video/mp4,video/webm" class="hidden" @change="escolherArquivoPost" />
                  <button type="button" @click="inputPostArquivo?.click()" class="text-xs font-semibold text-[#635BFF] hover:underline">
                    {{ novoPostArquivo ? 'Trocar mídia' : 'Adicionar imagem ou vídeo' }}
                  </button>
                  <button
                    @click="criarPost"
                    :disabled="publicando"
                    class="bg-[#635BFF] text-white px-5 py-1.5 rounded-full font-bold text-xs hover:bg-[#5249e0] transition-colors shrink-0 disabled:opacity-50"
                  >
                    {{ publicando ? 'Publicando...' : 'Publicar' }}
                  </button>
                </div>
              </div>
            </div>
          </div>

          <p v-if="carregandoPosts" class="p-8 text-center text-sm text-gray-500">Carregando publicações...</p>
          <p v-else-if="posts.length === 0" class="p-8 text-center text-sm text-gray-500">Você ainda não publicou nada.</p>

          <!-- Lista -->
          <article v-for="post in posts" :key="post.id" class="p-4 hover:bg-gray-50/50 flex gap-3 text-left">
            <img v-if="dados.foto_perfil_url" :src="dados.foto_perfil_url" class="w-10 h-10 rounded-full object-cover shrink-0" alt="" />
            <div v-else class="w-10 h-10 rounded-full bg-[#1A1A1A] text-white text-xs font-semibold flex items-center justify-center shrink-0">{{ iniciais }}</div>

            <div class="flex-1 min-w-0">
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-1 text-sm min-w-0">
                  <span class="font-bold title-dark truncate">{{ dados.nome || dados.nome_usuario }}</span>
                  <span class="text-gray-500 truncate">@{{ dados.nome_usuario }} · {{ post.tempo }}</span>
                </div>

                <div class="relative">
                  <button @click="alternarMenuPost(post.id)" class="text-gray-400 hover:text-gray-700 p-1.5 rounded-full hover:bg-gray-100 font-bold leading-none text-xs">•••</button>
                  <div v-if="menuPostAbertoId === post.id" class="absolute right-0 mt-1 w-44 bg-white rounded-xl shadow-lg border border-gray-100 py-1.5 z-30 text-xs">
                    <button @click="abrirModalEditarPost(post)" class="w-full text-left px-4 py-2 hover:bg-gray-50 text-gray-700 font-medium">✏️ Editar publicação</button>
                    <button @click="excluirPost(post)" class="w-full text-left px-4 py-2 hover:bg-red-50 text-red-600 font-semibold">🗑️ Excluir publicação</button>
                  </div>
                </div>
              </div>

              <p v-if="post.texto" class="text-sm mt-1 text-gray-800 leading-snug whitespace-pre-line">{{ post.texto }}</p>

              <div v-if="post.midia" class="mt-3 rounded-2xl overflow-hidden border border-gray-200 bg-gray-100">
                <video v-if="post.tipo === 'video'" :src="post.midia" controls preload="metadata" class="w-full max-h-80 bg-black object-contain" />
                <img v-else :src="post.midia" class="w-full max-h-80 object-cover" alt="" />
              </div>

              <!-- Interações -->
              <div class="flex items-center justify-between text-xs mt-3 text-gray-500 border-t border-gray-100 pt-3">
                <div class="flex items-center gap-6">
                  <button @click="alternarReacao(post, 'curtiu', 'curtidas')" :class="post.curtiu ? 'text-pink-600' : 'hover:text-pink-600'" class="flex items-center gap-1.5 transition-colors">
                    <svg class="w-5 h-5 fill-none stroke-current" stroke-width="2" viewBox="0 0 24 24">
                      <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.72-8.72 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" :fill="post.curtiu ? 'currentColor' : 'none'" />
                    </svg>
                    <span class="font-semibold">{{ post.curtidas }}</span>
                  </button>

                  <button @click="alternarReacao(post, 'comentou', 'comentarios')" :class="post.comentou ? 'text-[#635BFF]' : 'hover:text-[#635BFF]'" class="flex items-center gap-1.5 transition-colors">
                    <svg class="w-5 h-5 fill-none stroke-current" stroke-width="2" viewBox="0 0 24 24">
                      <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                    </svg>
                    <span class="font-semibold">{{ post.comentarios }}</span>
                  </button>

                  <button @click="alternarReacao(post, 'repostou', 'reposts')" :class="post.repostou ? 'text-green-600' : 'hover:text-green-600'" class="flex items-center gap-1.5 transition-colors">
                    <svg class="w-5 h-5 fill-none stroke-current" stroke-width="2" viewBox="0 0 24 24">
                      <polyline points="17 1 21 5 17 9" />
                      <path d="M3 11V9a4 4 0 0 1 4-4h14" />
                      <polyline points="7 23 3 19 7 15" />
                      <path d="M21 13v2a4 4 0 0 1-4 4H3" />
                    </svg>
                    <span class="font-semibold">{{ post.reposts }}</span>
                  </button>
                </div>

                <button @click="post.salvou = !post.salvou" :class="post.salvou ? 'text-[#635BFF]' : 'hover:text-[#635BFF]'" class="transition-colors p-1">
                  <svg class="w-5 h-5 fill-none stroke-current" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z" :fill="post.salvou ? 'currentColor' : 'none'" />
                  </svg>
                </button>
              </div>
            </div>
          </article>
        </div>

        <!-- ABA REPOSTS -->
        <div v-else-if="abaAtiva === 'reposts'" class="divide-y divide-gray-100">
          <div v-for="post in posts.filter((p) => p.repostou)" :key="post.id" class="p-4 text-left">
            <div class="flex items-center justify-between mb-2">
              <p class="text-xs font-semibold text-gray-500">🔄 Você repostou</p>
              <button @click="alternarReacao(post, 'repostou', 'reposts')" class="text-xs text-red-600 font-semibold hover:underline">Desfazer repost</button>
            </div>
            <p class="text-sm text-gray-800 leading-snug">{{ post.texto }}</p>
          </div>
          <div v-if="!posts.some((p) => p.repostou)" class="p-8 text-center text-gray-500 text-sm">
            <p class="font-bold text-gray-700 text-base mb-1">Nenhum repost ainda</p>
            <p>Quando você republicar um post, ele aparecerá aqui.</p>
          </div>
        </div>

        <!-- ABA CURTIDAS -->
        <div v-else class="divide-y divide-gray-100">
          <div v-for="post in posts.filter((p) => p.curtiu)" :key="post.id" class="p-4 text-left">
            <p class="text-sm text-gray-800 leading-snug">{{ post.texto }}</p>
          </div>
          <div v-if="!posts.some((p) => p.curtiu)" class="p-8 text-center text-gray-500 text-sm">
            <p class="font-bold text-gray-700 text-base mb-1">Nenhuma curtida ainda</p>
            <p>Quando você curtir uma publicação, ela aparecerá nesta lista.</p>
          </div>
        </div>
      </main>

      <!-- Direita (Apenas Desktop 980px+) -->
      <aside class="w-[320px] shrink-0 p-4 space-y-4 text-left hidden min-[980px]:block">
        <div class="relative">
          <input type="text" placeholder="Buscar no Librando" class="w-full bg-gray-100 rounded-full py-2 px-4 pl-10 text-sm text-gray-900 focus:outline-none" />
          <span class="absolute left-3.5 top-2.5 text-gray-400 text-sm">🔍</span>
        </div>
      </aside>
    </div>

    <!-- MODAL EDITAR PERFIL -->
    <div v-if="modalEdicaoAberta" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4 backdrop-blur-sm">
      <div class="bg-white rounded-2xl w-full max-w-lg overflow-hidden shadow-2xl text-left">
        <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100">
          <div class="flex items-center gap-4">
            <button @click="fecharModalEdicao" class="text-gray-600 font-bold text-lg p-1">✕</button>
            <h3 class="font-bold text-lg text-gray-900">Editar perfil</h3>
          </div>
          <button @click="salvarPerfil" :disabled="salvandoPerfil" class="bg-gray-900 text-white px-5 py-1.5 rounded-full font-bold text-sm hover:bg-black disabled:opacity-50">
            {{ salvandoPerfil ? 'Salvando...' : 'Salvar' }}
          </button>
        </div>

        <div v-if="mensagemErro" class="bg-red-50 text-red-600 px-4 py-2.5 text-xs font-semibold border-b border-red-100">
          ⚠️ {{ mensagemErro }}
        </div>

        <div class="max-h-[80vh] overflow-y-auto">
          <input ref="inputCapa" type="file" accept="image/jpeg,image/png,image/webp" class="hidden" @change="escolherImagem($event, 'capa')" />
          <input ref="inputFoto" type="file" accept="image/jpeg,image/png,image/webp" class="hidden" @change="escolherImagem($event, 'foto')" />

          <div class="relative">
            <button type="button" @click="inputCapa?.click()" class="block w-full h-32 bg-gray-200 overflow-hidden relative group" aria-label="Trocar capa">
              <img v-if="previewCapa || dados.foto_capa_url" :src="previewCapa || dados.foto_capa_url" class="w-full h-full object-cover" alt="" />
              <span class="absolute inset-0 bg-black/40 group-hover:bg-black/55 text-white text-sm font-semibold flex items-center justify-center transition-colors">Clique aqui para trocar a capa</span>
            </button>

            <button type="button" @click="inputFoto?.click()" class="absolute -bottom-12 left-4 w-24 h-24 rounded-full border-4 border-white overflow-hidden bg-[#1A1A1A] group" aria-label="Trocar foto de perfil">
              <img v-if="previewFoto || dados.foto_perfil_url" :src="previewFoto || dados.foto_perfil_url" class="w-full h-full object-cover" alt="" />
              <span v-else class="text-white text-2xl font-semibold flex items-center justify-center w-full h-full">{{ iniciais }}</span>
              <span class="absolute inset-0 bg-black/50 group-hover:bg-black/65 text-white text-[10px] leading-tight font-semibold flex items-center justify-center text-center px-2 transition-colors">Clique aqui para trocar foto</span>
            </button>
          </div>

          <div class="p-4 pt-16 space-y-4">
            <div>
              <label class="block text-xs font-semibold text-gray-600 mb-1">Nome *</label>
              <input v-model="formEdicao.nome" type="text" class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:border-[#635BFF]" />
            </div>
            <div>
              <label class="block text-xs font-semibold text-gray-600 mb-1">Nome de utilizador (@) *</label>
              <input v-model="formEdicao.nome_usuario" type="text" class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:border-[#635BFF]" />
            </div>
            <div>
              <label class="block text-xs font-semibold text-gray-600 mb-1">Bio</label>
              <textarea v-model="formEdicao.bio" rows="3" class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:border-[#635BFF]"></textarea>
            </div>
            <div>
              <label class="block text-xs font-semibold text-gray-600 mb-1">Localização</label>
              <input v-model="formEdicao.localizacao" type="text" class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:border-[#635BFF]" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL EDITAR PUBLICAÇÃO -->
    <div v-if="modalEditarPostAberta" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4 backdrop-blur-sm">
      <div class="bg-white rounded-2xl w-full max-w-lg overflow-hidden shadow-2xl text-left">
        <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100">
          <div class="flex items-center gap-4">
            <button @click="modalEditarPostAberta = false" class="text-gray-600 font-bold text-lg p-1">✕</button>
            <h3 class="font-bold text-lg text-gray-900">Editar publicação</h3>
          </div>
          <button @click="salvarEdicaoPost" class="bg-[#635BFF] text-white px-5 py-1.5 rounded-full font-bold text-sm">Salvar</button>
        </div>
        <div class="p-4">
          <label class="block text-xs font-semibold text-gray-600 mb-1">Texto da publicação</label>
          <textarea v-model="textoPostEditando" rows="3" maxlength="280" class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:border-[#635BFF]"></textarea>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.brand-logo { color: #635BFF !important; }
.title-dark { color: #1A1A1A !important; }
.perfil-page h1, .perfil-page h2, .perfil-page h3 { opacity: 1 !important; }
</style>
