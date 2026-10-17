<template>
  <div class="perfil-page min-h-screen bg-[#F8F9FA] flex justify-center text-slate-900">
    <div class="w-full max-w-[1280px] flex">

      <!-- ESQUERDA: Sidebar -->
      <aside class="w-[240px] shrink-0 border-r border-gray-200 p-4 flex flex-col justify-between sticky top-0 h-screen bg-white z-20">
        <div>
          <div class="px-2 mb-6 text-left">
            <h1 class="brand-logo text-3xl font-extrabold leading-none">Librando.</h1>
            <p class="text-[10px] text-gray-500 font-bold tracking-wider mt-1">CONEXÕES EM LIBRAS</p>
          </div>

          <nav class="space-y-1 text-left">
            <router-link to="/feed" class="flex items-center gap-3.5 px-3 py-2.5 rounded-xl font-medium text-gray-700 hover:bg-gray-100">
              <svg class="w-6 h-6 stroke-current fill-none" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22" />
              </svg>
              <span>Página inicial</span>
            </router-link>

            <a href="#" class="flex items-center gap-3.5 px-3 py-2.5 rounded-xl font-medium text-gray-700 hover:bg-gray-100">
              <svg class="w-6 h-6 stroke-current fill-none" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" />
                <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76" />
              </svg>
              <span>Explorar</span>
            </a>

            <a href="#" class="flex items-center gap-3.5 px-3 py-2.5 rounded-xl font-medium text-gray-700 hover:bg-gray-100">
              <svg class="w-6 h-6 stroke-current fill-none" stroke-width="2" viewBox="0 0 24 24">
                <polygon points="23 7 16 12 23 17 23 7" />
                <rect x="1" y="5" width="15" height="14" rx="2" ry="2" />
              </svg>
              <span>Vídeos</span>
            </a>

            <a href="#" class="flex items-center justify-between px-3 py-2.5 rounded-xl font-medium text-gray-700 hover:bg-gray-100">
              <div class="flex items-center gap-3.5">
                <svg class="w-6 h-6 stroke-current fill-none" stroke-width="2" viewBox="0 0 24 24">
                  <line x1="22" y1="2" x2="11" y2="13" />
                  <polygon points="22 2 15 22 11 13 2 9 22 2" />
                </svg>
                <span>Mensagens</span>
              </div>
              <span class="bg-[#635BFF] text-white text-xs font-bold px-2 py-0.5 rounded-full">3</span>
            </a>

            <a href="#" class="flex items-center gap-3.5 px-3 py-2.5 rounded-xl font-medium text-gray-700 hover:bg-gray-100">
              <svg class="w-6 h-6 stroke-current fill-none" stroke-width="2" viewBox="0 0 24 24">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.72-8.72 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
              </svg>
              <span>Notificações</span>
            </a>

            <a href="#" class="flex items-center gap-3.5 px-3 py-2.5 rounded-xl font-medium text-gray-700 hover:bg-gray-100">
              <svg class="w-6 h-6 stroke-current fill-none" stroke-width="2" viewBox="0 0 24 24">
                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z" />
              </svg>
              <span>Salvos</span>
            </a>

            <router-link to="/perfil" class="flex items-center gap-3.5 px-3 py-2.5 rounded-xl font-bold text-[#635BFF] bg-purple-50">
              <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
              </svg>
              <span>Meu perfil</span>
            </router-link>

            <a href="#" class="flex items-center gap-3.5 px-3 py-2.5 rounded-xl font-medium text-gray-700 hover:bg-gray-100">
              <svg class="w-6 h-6 stroke-current fill-none" stroke-width="2" viewBox="0 0 24 24">
                <line x1="3" y1="12" x2="21" y2="12" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="18" x2="21" y2="18" />
              </svg>
              <span>Mais</span>
            </a>
          </nav>
        </div>
      </aside>

      <!-- CENTRO -->
      <main class="flex-1 max-w-[600px] border-r border-gray-200 bg-white min-h-screen text-left">

        <!-- Topo -->
        <div class="flex items-center gap-6 px-4 py-2 sticky top-0 bg-white/90 backdrop-blur-md z-10 border-b border-gray-100">
          <router-link to="/feed" class="text-gray-700 text-lg p-2 hover:bg-gray-100 rounded-full flex items-center justify-center">←</router-link>
          <div>
            <h2 class="title-dark font-bold text-lg leading-tight">{{ dados.nome || dados.nome_usuario }}</h2>
            <p class="text-xs text-gray-500">{{ posts.length }} publicações</p>
          </div>
        </div>

        <!-- Capa e foto -->
        <div class="relative">
          <div class="h-40 bg-gray-200 w-full overflow-hidden">
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
              class="w-28 h-28 rounded-full border-4 border-white object-cover shadow-md"
              alt="Foto de perfil"
            />
            <div
              v-else
              class="w-28 h-28 rounded-full border-4 border-white bg-[#1A1A1A] text-white text-3xl font-semibold flex items-center justify-center shadow-md"
            >
              {{ iniciais }}
            </div>
          </div>
        </div>

        <!-- Detalhes -->
        <div class="px-4 mt-12 text-left">
          <h1 class="title-dark text-2xl font-extrabold">{{ dados.nome || dados.nome_usuario }}</h1>
          <p class="text-sm text-gray-500">@{{ dados.nome_usuario }}</p>
          <p v-if="dados.bio" class="text-sm mt-3 text-gray-800 leading-normal">{{ dados.bio }}</p>
          <p v-if="dados.localizacao" class="text-xs text-gray-500 mt-3">📍 {{ dados.localizacao }}</p>
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

                <div class="flex items-center justify-between gap-2">
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

                  <button class="hover:text-[#635BFF] transition-colors flex items-center gap-1.5">
                    <svg class="w-5 h-5 fill-none stroke-current" stroke-width="2" viewBox="0 0 24 24">
                      <line x1="22" y1="2" x2="11" y2="13" />
                      <polygon points="22 2 15 22 11 13 2 9 22 2" />
                    </svg>
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

      <!-- Direita -->
      <aside class="w-[320px] shrink-0 p-4 space-y-4 text-left hidden lg:block">
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
          <!-- Capa e foto clicáveis -->
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

<script setup>
import { ref, reactive, computed, onMounted, onBeforeUnmount } from 'vue'
import { useRouter } from 'vue-router'
import api from '../services/api'

const router = useRouter()

const abaAtiva = ref('publicacoes')
const mensagemErro = ref('')

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
    // O api.js usa JSON como padrão; sem este header os arquivos se perderiam
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

onMounted(async () => {
  await carregar()
  carregarPosts()
})

onBeforeUnmount(limparPreviews)
</script>

<style scoped>
.brand-logo { color: #635BFF !important; }
.title-dark { color: #1A1A1A !important; }
.perfil-page h1, .perfil-page h2, .perfil-page h3 { opacity: 1 !important; }
</style>