<script setup>
import { ref, computed } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

/* Ícones do Sistema */
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
  logout: '<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>',
  search: '<circle cx="11" cy="11" r="7"/><path d="m20 20-3.500-3.500"/>',
  edit: '<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>',
  videoCall: '<path d="m22 8-6 4 6 4V8z"/><rect x="2" y="6" width="14" height="12" rx="2"/>',
  info: '<circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/>',
  image: '<rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/>',
  smile: '<circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/>',
  trash: '<polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>',
  star: '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
  pencil: '<path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"/>',
  users: '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>'
}

/* Navegação da Barra Lateral */
const navItems = [
  { label: 'Página inicial', icon: 'home', route: '/feed' },
  { label: 'Explorar', icon: 'explore' },
  { label: 'Vídeos', icon: 'video' },
  { label: 'Mensagens', icon: 'send', route: '/Mensagem', active: true, badge: 3 },
  { label: 'Notificações', icon: 'heart' },
  { label: 'Salvos', icon: 'bookmark' },
  { label: 'Meu perfil', icon: 'user', route: '/perfil' },
  { label: 'Mais', icon: 'menu' },
  { label: 'Sair', icon: 'logout', action: 'sair', mobileOnly: true }
]

function navegarPara(item) {
  if (item.action === 'sair') {
    sair()
  } else if (item.route) {
    router.push(item.route)
  }
}

function sair() {
  localStorage.removeItem('token')
  localStorage.removeItem('nome')
  localStorage.removeItem('nome_usuario')
  router.replace('/login')
}

/* Dados Simulados das Conversas */
const conversas = ref([
  {
    id: 1,
    nome: 'Maria Silva',
    usuario: 'mariasilva',
    foto: '',
    online: true,
    naoLidas: 2,
    isGrupo: false,
    ultimaMensagem: 'Aprendi um sinal novo em Libras hoje!',
    tempo: '5 min',
    mensagens: [
      { id: 101, autor: 'mariasilva', texto: 'Olá! Tudo bem?', hora: '14:20', enviadaPorMim: false, importante: false, editada: false },
      { id: 102, autor: 'meu_usuario', texto: 'Tudo ótimo e contigo?', hora: '14:22', enviadaPorMim: true, importante: false, editada: false },
      { id: 103, autor: 'mariasilva', texto: 'Aprendi um sinal novo em Libras hoje!', hora: '14:25', enviadaPorMim: false, importante: false, editada: false }
    ]
  },
  {
    id: 2,
    nome: 'João Pedro',
    usuario: 'joaopedro',
    foto: '',
    online: false,
    naoLidas: 0,
    isGrupo: false,
    ultimaMensagem: 'Vamos fazer uma videochamada para treinar?',
    tempo: '2 h',
    mensagens: [
      { id: 201, autor: 'joaopedro', texto: 'Vamos fazer uma videochamada para treinar?', hora: '12:10', enviadaPorMim: false, importante: false, editada: false }
    ]
  },
  {
    id: 3,
    nome: 'Comunidade Surda SP',
    usuario: 'grupo_sp',
    foto: '',
    online: true,
    isGrupo: true,
    naoLidas: 1,
    ultimaMensagem: 'Ana: O encontro presencial será no sábado!',
    tempo: '1 d',
    mensagens: [
      { id: 301, autor: 'ana', texto: 'O encontro presencial será no sábado!', hora: 'Ontem', enviadaPorMim: false, importante: false, editada: false }
    ]
  }
])

const conversaAtiva = ref(conversas.value[0])
const novaMensagemTexto = ref('')
const termoBusca = ref('')
const abaAtiva = ref('principais')
const mostrarPainelInfo = ref(false)

/* Estados de Edição de Mensagem */
const mensagemEmEdicao = ref(null)
const textoEdicao = ref('')

/* Estado do Modal de Criar Grupo */
const modalGrupoAberto = ref(false)
const nomeNovoGrupo = ref('')

const conversasFiltradas = computed(() => {
  return conversas.value.filter(c => 
    c.nome.toLowerCase().includes(termoBusca.value.toLowerCase()) ||
    c.usuario.toLowerCase().includes(termoBusca.value.toLowerCase())
  )
})

function selecionarConversa(conversa) {
  conversaAtiva.value = conversa
  conversa.naoLidas = 0
  cancelarEdicao()
}

function enviarMensagem() {
  const texto = novaMensagemTexto.value.trim()
  if (!texto || !conversaAtiva.value) return

  const novaMsg = {
    id: Date.now(),
    autor: 'meu_usuario',
    texto,
    hora: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }),
    enviadaPorMim: true,
    importante: false,
    editada: false
  }

  conversaAtiva.value.mensagens.push(novaMsg)
  conversaAtiva.value.ultimaMensagem = texto
  conversaAtiva.value.tempo = 'agora'
  novaMensagemTexto.value = ''
}

/* Criar Novo Grupo */
function criarGrupo() {
  const nome = nomeNovoGrupo.value.trim()
  if (!nome) return

  const novoGrupo = {
    id: Date.now(),
    nome: nome,
    usuario: `grupo_${Date.now()}`,
    foto: '',
    online: true,
    isGrupo: true,
    naoLidas: 0,
    ultimaMensagem: 'Grupo criado com sucesso!',
    tempo: 'agora',
    mensagens: [
      { id: Date.now() + 1, autor: 'sistema', texto: `Grupo "${nome}" criado. Sejam bem-vindos!`, hora: 'Agora', enviadaPorMim: false, importante: false, editada: false }
    ]
  }

  conversas.value.unshift(novoGrupo)
  conversaAtiva.value = novoGrupo
  nomeNovoGrupo.value = ''
  modalGrupoAberto.value = false
}

/* Excluir Conversa Geral */
function excluirConversa(id) {
  const confirmar = window.confirm('Tem certeza de que deseja excluir esta conversa?')
  if (!confirmar) return
  
  conversas.value = conversas.value.filter(c => c.id !== id)
  if (conversaAtiva.value?.id === id) {
    conversaAtiva.value = conversas.value.length > 0 ? conversas.value[0] : null
  }
}

/* Funcionalidades de Edição (Update) */
function iniciarEdicao(msg) {
  mensagemEmEdicao.value = msg.id
  textoEdicao.value = msg.texto
}

function salvarEdicao(msg) {
  const novoTexto = textoEdicao.value.trim()
  if (!novoTexto) return

  msg.texto = novoTexto
  msg.editada = true
  conversaAtiva.value.ultimaMensagem = novoTexto
  mensagemEmEdicao.value = null
  textoEdicao.value = ''
}

function cancelarEdicao() {
  mensagemEmEdicao.value = null
  textoEdicao.value = ''
}

/* Alternar Mensagem Importante */
function alternarImportante(msg) {
  msg.importante = !msg.importante
}

/* Excluir Mensagem Individual */
function apagarMensagem(id) {
  if (!conversaAtiva.value) return
  conversaAtiva.value.mensagens = conversaAtiva.value.mensagens.filter(m => m.id !== id)
}

function iniciarChamadaVideo() {
  alert(`A iniciar chamada de vídeo em Libras com ${conversaAtiva.value.nome}...`)
}

function inicial(nome) {
  return nome ? nome.charAt(0).toUpperCase() : '?'
}
</script>

<template>
  <div class="min-h-screen bg-[#F8F9FA] pl-0 min-[980px]:pl-56 text-left font-sans text-[#1A1A1A] antialiased pb-20 min-[980px]:pb-0">
    
    <!-- BARRA LATERAL -->
    <aside class="fixed inset-x-0 bottom-0 z-20 flex flex-row justify-around items-center border-t border-gray-200 bg-white px-2 py-2 min-[980px]:inset-y-0 min-[980px]:left-0 min-[980px]:w-56 min-[980px]:flex-col min-[980px]:justify-between min-[980px]:px-4 min-[980px]:py-4 min-[980px]:border-r min-[980px]:border-t-0 min-[980px]:h-screen">
      <div class="w-full">
        <div class="hidden min-[980px]:block px-1 mb-3">
          <h1 class="text-[26px] font-extrabold leading-none tracking-tight" style="color: #635BFF !important;">
            Librando.
          </h1>
          <p class="mt-1 text-[10px] font-medium tracking-wide" style="color: #1A1A1A !important;">
            CONEXÕES EM LIBRAS
          </p>
        </div>

        <nav class="flex w-full flex-row justify-around items-center min-[980px]:flex-col min-[980px]:items-stretch min-[980px]:space-y-2.5" aria-label="Principal">
          <button
            v-for="item in navItems"
            :key="item.label"
            type="button"
            class="relative flex items-center justify-center gap-3 rounded-lg p-1.5 min-[980px]:px-3 min-[980px]:py-2.5 min-[980px]:justify-start min-[980px]:text-[15px] transition-colors"
            :class="[
              item.active ? 'text-[#635BFF] min-[980px]:bg-[#EEEDFF] min-[980px]:font-medium' : 'text-[#1A1A1A] hover:bg-gray-50',
              item.mobileOnly ? 'min-[980px]:hidden text-red-600' : ''
            ]"
            @click="navegarPara(item)"
          >
            <svg viewBox="0 0 24 24" class="h-6 w-6 shrink-0" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" v-html="icons[item.icon]" />
            <span class="hidden min-[980px]:inline">{{ item.label }}</span>
            <span v-if="item.badge" class="absolute top-1 right-1.5 min-[980px]:static min-[980px]:ml-auto flex h-4 w-4 min-[980px]:h-4.5 min-[980px]:min-w-4.5 items-center justify-center rounded-full bg-[#635BFF] text-[10px] min-[980px]:text-[11px] font-semibold text-white">
              {{ item.badge }}
            </span>
          </button>

          <button type="button" class="hidden min-[980px]:mt-3 min-[980px]:flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-[14px] font-semibold text-[#1A1A1A] transition-colors hover:bg-gray-50">
            <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" v-html="icons.plus" />
            Criar vídeo
          </button>
        </nav>
      </div>

      <div class="hidden min-[980px]:block w-full pt-2 border-t border-gray-200 mt-2">
        <button type="button" class="flex w-full items-center gap-3 rounded-lg px-3 py-2 text-left text-red-600 hover:bg-red-50 transition-colors font-medium text-[15px]" @click="sair">
          <svg viewBox="0 0 24 24" class="h-6 w-6 shrink-0" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" v-html="icons.logout" />
          <span>Sair</span>
        </button>
      </div>
    </aside>

    <!-- ÁREA DAS MENSAGENS -->
    <div class="h-screen max-w-[1400px] mx-auto flex overflow-hidden bg-white min-[980px]:border-l border-gray-200">
      
      <!-- PAINEL DE CONVERSAS -->
      <section class="w-full min-[980px]:w-[360px] flex flex-col border-r border-gray-200 bg-white shrink-0">
        <div class="p-4 border-b border-gray-100 flex items-center justify-between">
          <h2 class="text-[20px] font-bold" style="color: #635BFF !important;">Mensagens</h2>
          <div class="flex items-center gap-1">
            <button type="button" class="p-2 rounded-full hover:bg-gray-100 text-[#635BFF]" title="Criar Grupo" @click="modalGrupoAberto = true">
              <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" v-html="icons.users" />
            </button>
            <button type="button" class="p-2 rounded-full hover:bg-gray-100 text-[#1A1A1A]" title="Nova mensagem">
              <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" v-html="icons.edit" />
            </button>
          </div>
        </div>

        <div class="px-4 py-2">
          <div class="relative flex items-center">
            <svg viewBox="0 0 24 24" class="absolute left-3 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" v-html="icons.search" />
            <input
              v-model="termoBusca"
              type="text"
              placeholder="Pesquisar conversa..."
              class="w-full rounded-xl bg-gray-100 pl-9 pr-4 py-2 text-[14px] text-[#1A1A1A] placeholder:text-gray-500 focus:outline-none focus:ring-2 focus:ring-[#635BFF]/30"
            />
          </div>
        </div>

        <div class="flex border-b border-gray-100 text-[13px] font-medium text-gray-500 mt-2">
          <button
            type="button"
            class="flex-1 py-2.5 text-center border-b-2 transition-colors"
            :class="abaAtiva === 'principais' ? 'border-[#635BFF] text-[#635BFF] font-semibold' : 'border-transparent hover:text-[#1A1A1A]'"
            @click="abaAtiva = 'principais'"
          >
            Principais
          </button>
          <button
            type="button"
            class="flex-1 py-2.5 text-center border-b-2 transition-colors"
            :class="abaAtiva === 'gerais' ? 'border-[#635BFF] text-[#635BFF] font-semibold' : 'border-transparent hover:text-[#1A1A1A]'"
            @click="abaAtiva = 'gerais'"
          >
            Gerais
          </button>
          <button
            type="button"
            class="flex-1 py-2.5 text-center border-b-2 transition-colors"
            :class="abaAtiva === 'solicitacoes' ? 'border-[#635BFF] text-[#635BFF] font-semibold' : 'border-transparent hover:text-[#1A1A1A]'"
            @click="abaAtiva = 'solicitacoes'"
          >
            Solicitações
          </button>
        </div>

        <div class="flex-1 overflow-y-auto divide-y divide-gray-50">
          <div
            v-for="conversa in conversasFiltradas"
            :key="conversa.id"
            class="flex items-center gap-3 p-3.5 cursor-pointer transition-colors hover:bg-gray-50 group"
            :class="conversaAtiva?.id === conversa.id ? 'bg-[#EEEDFF]' : ''"
            @click="selecionarConversa(conversa)"
          >
            <div class="relative shrink-0">
              <span class="flex h-12 w-12 items-center justify-center rounded-full bg-[#635BFF] text-[16px] font-bold text-white">
                {{ inicial(conversa.nome) }}
              </span>
              <span v-if="conversa.online" class="absolute bottom-0 right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-green-500"></span>
            </div>

            <div class="min-w-0 flex-1">
              <div class="flex items-center justify-between">
                <p class="truncate text-[14px] font-semibold text-[#1A1A1A]">{{ conversa.nome }}</p>
                <span class="text-[11px] text-gray-400 shrink-0">{{ conversa.tempo }}</span>
              </div>
              <p class="truncate text-[13px] text-gray-500" :class="conversa.naoLidas > 0 ? 'font-bold text-[#1A1A1A]' : ''">
                {{ conversa.ultimaMensagem }}
              </p>
            </div>

            <button
              type="button"
              class="opacity-0 group-hover:opacity-100 p-1.5 text-gray-400 hover:text-red-600 transition-opacity"
              title="Excluir conversa"
              @click.stop="excluirConversa(conversa.id)"
            >
              <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" v-html="icons.trash" />
            </button>
          </div>
        </div>
      </section>

      <!-- PAINEL CENTRAL DO CHAT -->
      <main v-if="conversaAtiva" class="flex-1 flex flex-col bg-[#F8F9FA] relative">
        <header class="h-16 px-6 bg-white border-b border-gray-200 flex items-center justify-between shrink-0">
          <div class="flex items-center gap-3">
            <div class="relative">
              <span class="flex h-10 w-10 items-center justify-center rounded-full bg-[#635BFF] text-[14px] font-bold text-white">
                {{ inicial(conversaAtiva.nome) }}
              </span>
              <span v-if="conversaAtiva.online" class="absolute bottom-0 right-0 h-2.5 w-2.5 rounded-full border-2 border-white bg-green-500"></span>
            </div>
            <div>
              <h3 class="text-[15px] font-bold text-[#1A1A1A] leading-tight">{{ conversaAtiva.nome }}</h3>
              <p class="text-[12px] text-gray-500">@{{ conversaAtiva.usuario }} • {{ conversaAtiva.online ? 'Online agora' : 'Offline' }}</p>
            </div>
          </div>

          <div class="flex items-center gap-2">
            <button
              type="button"
              class="p-2.5 rounded-full text-[#635BFF] hover:bg-[#EEEDFF] transition-colors"
              title="Chamada de Vídeo em Libras"
              @click="iniciarChamadaVideo"
            >
              <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" v-html="icons.videoCall" />
            </button>
            <button
              type="button"
              class="p-2.5 rounded-full text-gray-600 hover:bg-gray-100 transition-colors"
              title="Detalhes da conversa"
              @click="mostrarPainelInfo = !mostrarPainelInfo"
            >
              <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" v-html="icons.info" />
            </button>
            <button
              type="button"
              class="p-2.5 rounded-full text-red-500 hover:bg-red-50 transition-colors"
              title="Excluir conversa inteira"
              @click="excluirConversa(conversaAtiva.id)"
            >
              <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" v-html="icons.trash" />
            </button>
          </div>
        </header>

        <!-- MENSAGENS -->
        <div class="flex-1 overflow-y-auto p-6 space-y-4">
          <div
            v-for="msg in conversaAtiva.mensagens"
            :key="msg.id"
            class="flex flex-col group"
            :class="msg.enviadaPorMim ? 'items-end' : 'items-start'"
          >
            <div v-if="mensagemEmEdicao === msg.id" class="flex flex-col gap-2 w-full max-w-[70%] bg-white p-3 rounded-2xl border border-[#635BFF] shadow-sm">
              <input
                v-model="textoEdicao"
                type="text"
                class="w-full text-[14px] border-b border-gray-200 pb-1 focus:outline-none focus:border-[#635BFF]"
                @keydown.enter="salvarEdicao(msg)"
                @keydown.esc="cancelarEdicao"
              />
              <div class="flex justify-end gap-2 text-[12px]">
                <button type="button" class="text-gray-500 hover:text-gray-700" @click="cancelarEdicao">Cancelar</button>
                <button type="button" class="font-semibold text-[#635BFF]" @click="salvarEdicao(msg)">Salvar</button>
              </div>
            </div>

            <div v-else class="flex items-center gap-1.5 max-w-[70%]" :class="msg.enviadaPorMim ? 'flex-row-reverse' : 'flex-row'">
              <div
                class="relative px-4 py-2.5 rounded-2xl text-[14px] leading-relaxed break-words shadow-sm"
                :class="msg.enviadaPorMim ? 'bg-[#635BFF] text-white rounded-br-none' : 'bg-white text-[#1A1A1A] border border-gray-100 rounded-bl-none'"
              >
                <svg
                  v-if="msg.importante"
                  viewBox="0 0 24 24"
                  class="absolute -top-2 -left-2 h-4 w-4 fill-yellow-400 stroke-yellow-500"
                  v-html="icons.star"
                />

                {{ msg.texto }}

                <span v-if="msg.editada" class="text-[10px] opacity-70 ml-1.5">(editada)</span>
              </div>

              <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                <button
                  type="button"
                  class="p-1 text-gray-400 hover:text-yellow-500 transition-colors"
                  :title="msg.importante ? 'Desmarcar importante' : 'Marcar como importante'"
                  @click="alternarImportante(msg)"
                >
                  <svg viewBox="0 0 24 24" class="h-4 w-4" :class="msg.importante ? 'fill-yellow-400 stroke-yellow-500' : ''" stroke="currentColor" stroke-width="1.8" v-html="icons.star" />
                </button>

                <button
                  v-if="msg.enviadaPorMim"
                  type="button"
                  class="p-1 text-gray-400 hover:text-[#635BFF] transition-colors"
                  title="Editar mensagem"
                  @click="iniciarEdicao(msg)"
                >
                  <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" v-html="icons.pencil" />
                </button>

                <button
                  v-if="msg.enviadaPorMim"
                  type="button"
                  class="p-1 text-gray-400 hover:text-red-600 transition-colors"
                  title="Apagar mensagem"
                  @click="apagarMensagem(msg.id)"
                >
                  <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" v-html="icons.trash" />
                </button>
              </div>
            </div>

            <span class="text-[10px] text-gray-400 mt-1 px-1">{{ msg.hora }}</span>
          </div>
        </div>

        <footer class="p-4 bg-white border-t border-gray-200 shrink-0">
          <form class="flex items-center gap-2" @submit.prevent="enviarMensagem">
            <div class="flex-1 relative flex items-center bg-gray-100 rounded-full px-4 py-2 border border-transparent focus-within:border-[#635BFF] focus-within:bg-white transition-all">
              <input
                v-model="novaMensagemTexto"
                type="text"
                placeholder="Escreva uma mensagem..."
                class="w-full bg-transparent text-[14px] text-[#1A1A1A] placeholder:text-gray-500 focus:outline-none"
              />
              <div class="flex items-center gap-1 text-gray-400">
                <button type="button" class="p-1 hover:text-[#635BFF]" title="Anexar imagem/vídeo">
                  <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" v-html="icons.image" />
                </button>
                <button type="button" class="p-1 hover:text-[#635BFF]" title="Inserir emoji">
                  <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" v-html="icons.smile" />
                </button>
              </div>
            </div>

            <button
              type="submit"
              :disabled="!novaMensagemTexto.trim()"
              class="px-5 py-2.5 rounded-full bg-[#635BFF] text-white font-semibold text-[14px] hover:bg-[#5249e6] transition-colors disabled:opacity-40 disabled:cursor-not-allowed shrink-0"
            >
              Enviar
            </button>
          </form>
        </footer>
      </main>

      <!-- PAINEL LATERAL DIREITO -->
      <aside v-if="mostrarPainelInfo && conversaAtiva" class="w-72 bg-white border-l border-gray-200 p-6 flex flex-col items-center text-center shrink-0">
        <span class="flex h-20 w-20 items-center justify-center rounded-full bg-[#635BFF] text-[28px] font-bold text-white mb-3">
          {{ inicial(conversaAtiva.nome) }}
        </span>
        <h4 class="text-[16px] font-bold text-[#1A1A1A]">{{ conversaAtiva.nome }}</h4>
        <p class="text-[13px] text-gray-500 mb-6">@{{ conversaAtiva.usuario }}</p>

        <div class="w-full border-t border-gray-100 pt-4 space-y-3 text-left text-[14px]">
          <button type="button" class="w-full text-left py-2 text-gray-700 hover:text-[#635BFF]">Ver perfil completo</button>
          <button type="button" class="w-full text-left py-2 text-gray-700 hover:text-[#635BFF]">Silenciar notificações</button>
          <button type="button" class="w-full text-left py-2 text-red-600 hover:bg-red-50 rounded-lg px-2" @click="excluirConversa(conversaAtiva.id)">Excluir conversa inteira</button>
        </div>
      </aside>
    </div>

    <!-- MODAL CRIAR GRUPO -->
    <div v-if="modalGrupoAberto" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4">
      <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-xl">
        <h3 class="text-[18px] font-bold text-[#1A1A1A] mb-4">Criar Novo Grupo</h3>
        <div class="space-y-4">
          <div>
            <label class="block text-[13px] font-semibold text-gray-700 mb-1">Nome do Grupo</label>
            <input
              v-model="nomeNovoGrupo"
              type="text"
              placeholder="Ex: Prática de Libras Básica"
              class="w-full rounded-xl border border-gray-200 px-4 py-2.5 text-[14px] focus:border-[#635BFF] focus:outline-none"
            />
          </div>
        </div>
        <div class="mt-6 flex justify-end gap-3">
          <button type="button" class="rounded-xl px-4 py-2 text-[14px] font-medium text-gray-600 hover:bg-gray-100" @click="modalGrupoAberto = false">Cancelar</button>
          <button type="button" :disabled="!nomeNovoGrupo.trim()" class="rounded-xl bg-[#635BFF] px-5 py-2 text-[14px] font-semibold text-white hover:bg-[#5249e6] disabled:opacity-40" @click="criarGrupo">Criar Grupo</button>
        </div>
      </div>
    </div>

  </div>
</template>