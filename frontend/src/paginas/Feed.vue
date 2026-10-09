
<script setup>
import { ref, computed } from 'vue'

/* ------------------------------------------------------------------
 * Ícones (SVG de traço, 24x24). Só o miolo do <svg> para manter o
 * template limpo.
 * ------------------------------------------------------------------ */
const icons = {
  home: '<path d="M3 10.5 12 3l9 7.5V20a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1z"/>',
  explore:
    '<circle cx="12" cy="12" r="9"/><path d="m15.5 8.5-2 5-5 2 2-5z"/>',
  video:
    '<rect x="3" y="7" width="18" height="14" rx="2"/><path d="m3 7 2.5-4h3L6 7m5 0 2.5-4h3L14 7m5 0 2-4"/>',
  send: '<path d="M21 3 3 10.5l7 3 3 7z"/><path d="M21 3 10 13.5"/>',
  heart:
    '<path d="M12 20.5s-8-4.7-8-11A4.5 4.5 0 0 1 12 7a4.5 4.5 0 0 1 8 2.500c0 6.300-8 11-8 11z"/>',
  bookmark: '<path d="M6 3h12v18l-6-4-6 4z"/>',
  user: '<circle cx="12" cy="12" r="9"/><circle cx="12" cy="10" r="3"/><path d="M6 18.500c1.500-2.500 3.500-3.500 6-3.500s4.500 1 6 3.500"/>',
  plus: '<rect x="3" y="3" width="18" height="18" rx="3"/><path d="M12 8v8M8 12h8"/>',
  menu: '<path d="M4 6h16M4 12h16M4 18h16"/>',
  search: '<circle cx="11" cy="11" r="7"/><path d="m20 20-3.500-3.500"/>',
  comment:
    '<path d="M21 11.500a8.500 8.500 0 0 1-12.600 7.400L3 20.500l1.600-5A8.500 8.500 0 1 1 21 11.500z"/>',
  more: '<circle cx="5" cy="12" r="1.200"/><circle cx="12" cy="12" r="1.200"/><circle cx="19" cy="12" r="1.200"/>',
  smile:
    '<circle cx="12" cy="12" r="9"/><path d="M8 14.500c1 1.200 2.300 1.800 4 1.800s3-.6 4-1.800"/><circle cx="9" cy="9.800" r=".6"/><circle cx="15" cy="9.800" r=".6"/>',
  chevron: '<path d="m9 6 6 6-6 6"/>',
  hash: '<path d="M5 9h14M5 15h14M10 4 8 20M16 4l-2 20"/>',
  hand: '<path d="M8 12V5.500a1.500 1.500 0 0 1 3 0V11m0-6.500a1.500 1.500 0 0 1 3 0V11m0-4.500a1.500 1.500 0 0 1 3 0V13m0-3.500a1.500 1.500 0 0 1 3 0V15c0 4-3 6.500-6.500 6.500S8 19.500 6 16.500L4 13.500a1.500 1.500 0 0 1 2.500-1.500L8 14"/>',
  arrowUp: '<path d="M7 17 17 7M8 7h9v9"/>',
  film: '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 9h18M7 5l2 4M12 5l2 4M17 5l2 4"/>',
  caption: '<rect x="3" y="5" width="18" height="14" rx="3"/><path d="M7 11h4M7 15h2m4-4h4m-4 4h4"/>',
  swap: '<path d="M7 7h12l-3-3M17 17H5l3 3"/>',
}

/* ------------------------------------------------------------------
 * Dados estáticos (menu, sugestões, hashtags)
 * ------------------------------------------------------------------ */
const navItems = [
  { label: 'Página inicial', icon: 'home', active: true },
  { label: 'Explorar', icon: 'explore' },
  { label: 'Vídeos', icon: 'video' },
  { label: 'Mensagens', icon: 'send', badge: 3 },
  { label: 'Notificações', icon: 'heart' },
  { label: 'Salvos', icon: 'bookmark' },
  { label: 'Meu perfil', icon: 'user' },
  { label: 'Mais', icon: 'menu' } 
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

/* ------------------------------------------------------------------
 * Abas do feed (visuais)
 * ------------------------------------------------------------------ */
const tabs = ['Para você', 'Seguindo']
const activeTab = ref('Para você')

/* ------------------------------------------------------------------
 * Feed (único estado funcional da página)
 * ------------------------------------------------------------------ */
let nextId = 3

const posts = ref([
  {
    id: 1,
    user: 'ana.em.libras',
    initials: 'AE',
    verified: true,
    role: 'Educadora de Libras · São Paulo',
    time: '2 h',
    title: 'Pequenos sinais, grandes conexões.',
    subtitle: '5 expressões para levar para o seu dia a dia.',
    duration: '0:48',
    hasVideo: true,
    likes: '1.248',
    comments: 86,
    caption: 'Um bom dia pode ser o começo de uma conversa incrível. Vamos aprender juntos? 💜',
    own: false,
  },
  {
    id: 2,
    user: 'lucas.sinaliza',
    initials: 'LS',
    verified: true,
    role: 'Criador de conteúdo · Rio de Janeiro',
    time: '2 h',
    title: 'A cultura surda tem muito a dizer.',
    subtitle: 'Histórias, identidade e uma comunidade que conecta.',
    duration: '1:12',
    hasVideo: true,
    likes: '964',
    comments: 41,
    caption: 'Conversa leve sobre identidade e comunidade. Conta pra gente o que você pensa!',
    own: false,
  },
])

/* ------------------------------------------------------------------
 * Caixa de criação de post
 * ------------------------------------------------------------------ */
const MAX_CHARS = 280
const draft = ref('')
const videoAttached = ref(false)
const captionAttached = ref(false)
const composerFocused = ref(false)

const remaining = computed(() => MAX_CHARS - draft.value.length)
const canPublish = computed(
  () => draft.value.trim().length > 0 || videoAttached.value,
)

function toggleVideo() {
  videoAttached.value = !videoAttached.value
  if (!videoAttached.value) captionAttached.value = false
}

function toggleCaption() {
  // A legenda só faz sentido com um vídeo anexado
  if (!videoAttached.value) videoAttached.value = true
  captionAttached.value = !captionAttached.value
}

function publish() {
  if (!canPublish.value) return

  const text = draft.value.trim()
  posts.value.unshift({
    id: nextId++,
    user: 'marina.costa',
    initials: 'MC',
    verified: false,
    role: 'Marina Costa',
    time: 'agora',
    title: videoAttached.value ? text.slice(0, 60) || 'Novo vídeo em Libras' : '',
    subtitle: videoAttached.value && captionAttached.value ? 'Com legenda' : '',
    duration: '0:00',
    hasVideo: videoAttached.value,
    likes: '0',
    comments: 0,
    caption: text,
    own: true,
  })

  draft.value = ''
  videoAttached.value = false
  captionAttached.value = false
  composerFocused.value = false
}
</script>

<template>
  <div class="min-h-screen bg-[#F8F9FA] font-sans text-[#1A1A1A] antialiased">
    <!-- ============================ SIDEBAR ============================ -->
    <aside
      class="fixed inset-y-0 left-0 z-20 flex w-[224px] flex-col border-r border-gray-200 bg-white px-4 py-8"
    >
      <div class="px-1">
        <h1 
          class="text-[32px] font-extrabold leading-none tracking-tight" 
          style="color: #635BFF !important;"
        >
          librando.
        </h1>
        <p 
          class="mt-1.5 text-[11px] font-medium tracking-wide" 
          style="color: #1A1A1A !important;"
        >
          CONEXÕES EM LIBRAS
        </p>
      </div>

      <nav class="mt-8 flex flex-col gap-1" aria-label="Principal">
        <button
          v-for="item in navItems"
          :key="item.label"
          type="button"
          class="flex items-center gap-4 rounded-lg px-3 py-3 text-left text-[16px] transition-colors"
          :class="
            item.active
              ? 'bg-[#EEEDFF] font-medium text-[#635BFF]'
              : 'text-[#1A1A1A] hover:bg-gray-50'
          "
          :aria-current="item.active ? 'page' : undefined"
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
            class="ml-1 flex h-[22px] min-w-[22px] items-center justify-center rounded-full bg-[#635BFF] px-1.5 text-[12px] font-semibold text-white"
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
        <button
          type="button"
          class="flex w-full items-center gap-4 rounded-lg px-3 py-3 text-[16px] hover:bg-gray-50"
        >
          <svg
            viewBox="0 0 24 24"
            class="h-6 w-6"
            fill="none"
            stroke="currentColor"
            stroke-width="1.7"
            stroke-linecap="round"
            aria-hidden="true"
            v-html="icons.menu"
          />
          Mais
        </button>

        <div class="mt-3 border-t border-gray-200 pt-4">
          <button
            type="button"
            class="flex w-full items-center gap-3 rounded-lg px-2 py-2 text-left hover:bg-gray-50"
          >
            <span
              class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#1A1A1A] text-[13px] font-semibold text-white"
            >
              MC
            </span>
            <span class="min-w-0 flex-1">
              <span class="block truncate text-[14px] font-semibold">Marina Costa</span>
              <span class="block truncate text-[12px] text-gray-500">@marina.costa</span>
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

    <!-- ============================ CONTEÚDO ============================ -->
    <div
      class="ml-[224px] mx-auto grid max-w-[1140px] grid-cols-[minmax(0,720px)_minmax(0,320px)] justify-center gap-[48px] px-8 py-8"
    >
      <!-- ---------------------- COLUNA CENTRAL ---------------------- -->
      <main>
        <header class="mb-5 flex items-end justify-between">
          <h2 class="text-[24px] font-bold tracking-tight" style="color: #1A1A1A !important; -webkit-text-fill-color: #1A1A1A !important; opacity: 1 !important; visibility: visible !important;">
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
              :class="
                activeTab === tab
                  ? 'border-[#635BFF] font-medium text-[#635BFF]'
                  : 'border-transparent text-gray-600'
              "
              @click="activeTab = tab"
            >
              {{ tab }}
            </button>
          </div>
        </header>

        <!-- ------------- CAIXA DE CRIAÇÃO DE POST (funcional) ------------- -->
        <section
          class="mb-5 rounded-2xl border border-gray-200 bg-white p-4 transition-shadow"
          :class="composerFocused ? 'ring-2 ring-[#635BFF]/30' : ''"
          aria-label="Criar publicação"
        >
          <div class="flex gap-3">
            <span
              class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#1A1A1A] text-[13px] font-semibold text-white"
            >
              MC
            </span>
            <div class="min-w-0 flex-1">
              <label for="composer" class="sr-only">O que quer compartilhar?</label>
              <textarea
                id="composer"
                v-model="draft"
                :maxlength="MAX_CHARS"
                rows="2"
                placeholder="O que quer compartilhar em Libras ou texto?"
                class="w-full resize-none bg-transparent pt-2 text-[15px] leading-6 text-[#1A1A1A] placeholder:text-gray-500 focus:outline-none"
                @focus="composerFocused = true"
                @blur="composerFocused = false"
                @keydown.ctrl.enter="publish"
                @keydown.meta.enter="publish"
              />

              <!-- Anexos simulados -->
              <div v-if="videoAttached" class="mt-2 flex flex-wrap gap-2">
                <span
                  class="inline-flex items-center gap-2 rounded-full bg-[#EEEDFF] px-3 py-1 text-[13px] font-medium text-[#635BFF]"
                >
                  <svg
                    viewBox="0 0 24 24"
                    class="h-4 w-4"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                    v-html="icons.film"
                  />
                  video-libras.mp4
                  <button
                    type="button"
                    class="text-[#635BFF]/70 hover:text-[#635BFF]"
                    aria-label="Remover vídeo"
                    @click="toggleVideo"
                  >
                    ×
                  </button>
                </span>
                <span
                  v-if="captionAttached"
                  class="inline-flex items-center gap-2 rounded-full bg-[#EEEDFF] px-3 py-1 text-[13px] font-medium text-[#635BFF]"
                >
                  <svg
                    viewBox="0 0 24 24"
                    class="h-4 w-4"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                    v-html="icons.caption"
                  />
                  legenda.srt
                  <button
                    type="button"
                    class="text-[#635BFF]/70 hover:text-[#635BFF]"
                    aria-label="Remover legenda"
                    @click="captionAttached = false"
                  >
                    ×
                  </button>
                </span>
              </div>

              <div class="mt-3 flex items-center justify-between border-t border-gray-100 pt-3">
                <div class="flex items-center gap-2">
                  <button
                    type="button"
                    class="flex items-center gap-2 rounded-lg px-3 py-1.5 text-[14px] font-medium transition-colors"
                    :class="
                      videoAttached
                        ? 'bg-[#EEEDFF] text-[#635BFF]'
                        : 'text-[#1A1A1A] hover:bg-gray-100'
                    "
                    @click="toggleVideo"
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
                    Vídeo
                  </button>
                  <button
                    type="button"
                    class="flex items-center gap-2 rounded-lg px-3 py-1.5 text-[14px] font-medium transition-colors"
                    :class="
                      captionAttached
                        ? 'bg-[#EEEDFF] text-[#635BFF]'
                        : 'text-[#1A1A1A] hover:bg-gray-100'
                    "
                    @click="toggleCaption"
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
                      v-html="icons.caption"
                    />
                    Legenda
                  </button>
                </div>

                <div class="flex items-center gap-4">
                  <span
                    v-if="draft.length > 0"
                    class="text-[13px] tabular-nums"
                    :class="remaining < 20 ? 'text-red-600' : 'text-gray-500'"
                  >
                    {{ remaining }}
                  </span>
                  <button
                    type="button"
                    :disabled="!canPublish"
                    class="rounded-lg bg-[#635BFF] px-5 py-2 text-[14px] font-semibold text-white transition-colors hover:bg-[#5249e6] disabled:cursor-not-allowed disabled:opacity-40"
                    @click="publish"
                  >
                    Publicar
                  </button>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- ------------------------- POSTS ------------------------- -->
        <article
          v-for="post in posts"
          :key="post.id"
          class="mb-5 overflow-hidden rounded-2xl border border-gray-200 bg-white"
        >
          <!-- Cabeçalho -->
          <div class="flex items-center gap-3 px-5 py-4">
            <span
              class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#1A1A1A] text-[13px] font-semibold text-white"
            >
              {{ post.initials }}
            </span>
            <div class="min-w-0 flex-1 leading-tight">
              <p class="flex items-center gap-1.5 text-[15px] font-semibold">
                {{ post.user }}
                <svg
                  v-if="post.verified"
                  viewBox="0 0 24 24"
                  class="h-4 w-4 text-[#635BFF]"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  aria-label="Perfil verificado"
                >
                  <circle cx="12" cy="12" r="9" />
                  <path d="m8.500 12.200 2.300 2.300 4.700-4.800" />
                </svg>
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
            <button
              type="button"
              class="rounded-full p-2 text-[#1A1A1A] hover:bg-gray-100"
              aria-label="Mais opções"
            >
              <svg
                viewBox="0 0 24 24"
                class="h-5 w-5"
                fill="currentColor"
                aria-hidden="true"
                v-html="icons.more"
              />
            </button>
          </div>

          <!-- Player (representativo) -->
          <div
            v-if="post.hasVideo"
            class="relative flex aspect-[720/440] flex-col justify-between overflow-hidden bg-gradient-to-br from-gray-500 via-gray-700 to-gray-900 text-white"
          >
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent" />

            <div class="relative flex items-start justify-between p-5">
              <span
                class="inline-flex items-center gap-2 rounded-md bg-black/50 px-3 py-1.5 text-[11px] font-semibold uppercase tracking-wide backdrop-blur"
              >
                <svg
                  viewBox="0 0 24 24"
                  class="h-3.5 w-3.5"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  aria-hidden="true"
                  v-html="icons.film"
                />
                Vídeo em Libras
              </span>
              <span class="rounded-md bg-black/50 p-1.5 backdrop-blur" aria-label="Legendas">
                <svg
                  viewBox="0 0 24 24"
                  class="h-5 w-5"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="1.8"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  aria-hidden="true"
                  v-html="icons.caption"
                />
              </span>
            </div>

            <!-- Botão play central -->
            <button
              type="button"
              class="absolute left-1/2 top-[42%] flex h-[60px] w-[60px] -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full border border-white/70 bg-black/30 backdrop-blur"
              aria-label="Reproduzir vídeo"
            >
              <svg viewBox="0 0 24 24" class="ml-0.5 h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round">
                <path d="M8 5.500v13l11-6.500z" />
              </svg>
            </button>

            <div class="relative px-6 pb-4">
              <h3 v-if="post.title" class="text-[30px] font-bold leading-tight tracking-tight">
                {{ post.title }}
              </h3>
              <p v-if="post.subtitle" class="mt-1 text-[14px] text-white/90">{{ post.subtitle }}</p>

              <!-- Controles -->
              <div class="mt-4 flex items-center gap-4 text-[12px]">
                <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round" aria-hidden="true">
                  <path d="M8 5.500v13l11-6.500z" />
                </svg>
                <span class="tabular-nums">0:00 / {{ post.duration }}</span>
                <div class="relative h-[3px] flex-1 rounded-full bg-white/30">
                  <div class="absolute inset-y-0 left-0 w-[6%] rounded-full bg-[#635BFF]" />
                </div>
                <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M4 9.500h3.500L12 6v12l-4.500-3.500H4zM16 9.500l4 5m0-5-4 5" />
                </svg>
                <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M4 9V4h5M20 9V4h-5M4 15v5h5M20 15v5h-5" />
                </svg>
              </div>
            </div>
          </div>

          <!-- Post só de texto -->
          <div v-else class="px-5 pb-1 text-[16px] leading-7">
            {{ post.caption }}
          </div>

          <!-- Ações -->
          <div class="flex items-center gap-5 px-5 pt-4">
            <button type="button" class="flex items-center gap-2 text-[14px] font-semibold">
              <svg viewBox="0 0 24 24" class="h-6 w-6 text-[#635BFF]" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" v-html="icons.heart" />
              {{ post.likes }}
            </button>
            <button type="button" class="flex items-center gap-2 text-[14px]">
              <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" v-html="icons.comment" />
              {{ post.comments }}
            </button>
            <button type="button" aria-label="Compartilhar">
              <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" v-html="icons.send" />
            </button>
            <button type="button" class="ml-auto" aria-label="Salvar">
              <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" v-html="icons.bookmark" />
            </button>
          </div>

          <!-- Legenda + comentários -->
          <div class="px-5 pb-4 pt-3 text-[14px]">
            <p v-if="post.hasVideo && post.caption">
              <span class="mr-1.5">{{ post.user }}</span>{{ post.caption }}
            </p>
            <button
              v-if="post.comments > 0"
              type="button"
              class="mt-2 text-[13px] text-gray-500"
            >
              Ver todos os {{ post.comments }} comentários
            </button>

            <div class="mt-3 flex items-center gap-3 border-t border-gray-200 pt-3">
              <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" aria-hidden="true" v-html="icons.smile" />
              <span class="flex-1 text-[13px] text-gray-500">Adicione um comentário...</span>
              <button type="button" class="text-[13px] font-semibold text-[#635BFF]">Publicar</button>
            </div>
          </div>
        </article>
      </main>

      <!-- ---------------------- COLUNA DIREITA ---------------------- -->
      <aside class="sticky top-8 h-fit self-start">
        <!-- Pesquisa -->
        <div class="flex items-center gap-3 rounded-xl border border-gray-200 bg-white px-4 py-3">
          <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true" v-html="icons.search" />
          <input
            type="text"
            placeholder="Pesquisar no Librando"
            class="w-full bg-transparent text-[14px] placeholder:text-gray-500 focus:outline-none"
            aria-label="Pesquisar no Librando"
          />
        </div>

        <!-- Perfil atual -->
        <div class="mt-6 flex items-center gap-3">
          <span class="flex h-12 w-12 items-center justify-center rounded-full bg-[#1A1A1A] text-[14px] font-semibold text-white">MC</span>
          <div class="min-w-0 flex-1 leading-tight">
            <p class="text-[14px] font-medium">marina.costa</p>
            <p class="mt-0.5 text-[13px] text-gray-500">Marina Costa</p>
          </div>
          <button type="button" class="text-[12px] font-semibold text-[#635BFF]">Trocar</button>
        </div>

        <!-- Sugestões -->
        <div class="mt-6 flex items-center justify-between">
          <h3 class="text-[14px] text-gray-700">Sugestões para você</h3>
          <button type="button" class="text-[12px] font-semibold text-[#635BFF]">Ver todos</button>
        </div>

        <ul class="mt-4 space-y-4">
          <li v-for="s in suggestions" :key="s.handle" class="flex items-center gap-3">
            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gray-700 text-[12px] font-semibold text-white">{{ s.initials }}</span>
            <div class="min-w-0 flex-1 leading-tight">
              <p class="truncate text-[13px] font-medium">{{ s.name }}</p>
              <p class="mt-0.5 truncate text-[12px] text-gray-500">{{ s.handle }}</p>
              <p class="mt-0.5 truncate text-[11px] text-gray-500">{{ s.note }}</p>
            </div>
            <button type="button" class="rounded-lg bg-[#635BFF] px-4 py-2 text-[13px] font-semibold text-white hover:bg-[#5249e6]">
              Seguir
            </button>
          </li>
        </ul>

        <!-- Em alta -->
        <div class="mt-6 border-t border-gray-200 pt-6">
          <h3 class="text-[14px] text-gray-700">Em alta na comunidade</h3>
          <ul class="mt-4 space-y-3">
            <li v-for="t in trending" :key="t.tag">
              <button type="button" class="flex w-full items-center gap-3 text-left">
                <span class="flex h-10 w-10 items-center justify-center rounded-lg border border-gray-200 bg-white text-[#635BFF]">
                  <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true" v-html="icons.hash" />
                </span>
                <span class="flex-1 leading-tight">
                  <span class="block text-[13px] font-semibold">{{ t.tag }}</span>
                  <span class="mt-0.5 block text-[12px] text-gray-500">{{ t.count }}</span>
                </span>
                <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" v-html="icons.chevron" />
              </button>
            </li>
          </ul>
        </div>

        <!-- Boas-vindas -->
        <div class="mt-6 rounded-2xl border border-gray-200 bg-white p-5">
          <svg viewBox="0 0 24 24" class="h-7 w-7 text-[#635BFF]" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" v-html="icons.hand" />
          <h3 class="mt-3 text-[16px] font-medium">Cada sinal aproxima.</h3>
          <p class="mt-2 text-[13px] leading-5 text-gray-500">
            Um espaço para compartilhar, aprender e se conectar em Libras. Do seu jeito.
          </p>
          <a href="#" class="mt-4 inline-flex items-center gap-1.5 text-[13px] font-semibold text-[#635BFF]" @click.prevent>
            Conheça o Librando
            <svg viewBox="0 0 24 24" class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" v-html="icons.arrowUp" />
          </a>
        </div>

        <!-- Rodapé -->
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
