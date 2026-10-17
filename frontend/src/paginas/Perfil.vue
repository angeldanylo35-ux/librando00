<template>
  <div class="perfil-page min-h-screen bg-[#F8F9FA] flex justify-center text-slate-900">
    <!-- Container Principal Responsivo -->
    <div class="w-full max-w-[1280px] flex">
      
      <!-- 1. ESQUERDA: Sidebar Nav -->
      <aside class="w-[240px] shrink-0 border-r border-gray-200 p-4 flex flex-col justify-between sticky top-0 h-screen bg-white z-20">
        <div>
          <!-- Logo -->
          <div class="px-2 mb-6 text-left">
            <h1 class="brand-logo text-3xl font-extrabold leading-none">librando.</h1>
            <p class="text-[10px] text-gray-500 font-bold tracking-wider mt-1">CONEXÕES EM LIBRAS</p>
          </div>

          <!-- Menu de Navegação -->
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
                <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18" />
                <line x1="7" y1="2" x2="7" y2="22" />
                <line x1="17" y1="2" x2="17" y2="22" />
                <line x1="2" y1="12" x2="22" y2="12" />
                <line x1="2" y1="7" x2="7" y2="17" />
                <line x1="17" y1="17" x2="22" y2="17" />
                <line x1="17" y1="7" x2="22" y2="7" />
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

            <!-- Meu perfil (Ativo) -->
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

          <!-- Botão Criar Vídeo -->
          <button class="w-full mt-6 border-2 border-gray-200 text-gray-800 py-2.5 rounded-2xl font-bold hover:bg-gray-50 flex items-center justify-center gap-2 transition-all">
            <svg class="w-5 h-5 stroke-current fill-none" stroke-width="2" viewBox="0 0 24 24">
              <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
              <line x1="12" y1="8" x2="12" y2="16" />
              <line x1="8" y1="12" x2="16" y2="12" />
            </svg>
            <span>Criar vídeo</span>
          </button>
        </div>
      </aside>

      <!-- 2. CENTRO: Conteúdo Principal -->
      <main class="flex-1 max-w-[600px] border-r border-gray-200 bg-white min-h-screen text-left">
        
        <!-- Topo Sticky -->
        <div class="flex items-center gap-6 px-4 py-2 sticky top-0 bg-white/90 backdrop-blur-md z-10 border-b border-gray-100">
          <router-link to="/feed" class="text-gray-700 text-lg p-2 hover:bg-gray-100 rounded-full flex items-center justify-center">
            ←
          </router-link>
          <div>
            <h2 class="title-dark font-bold text-lg leading-tight flex items-center gap-1">
              {{ perfil.nome }}
              <span class="text-[#635BFF] text-sm">✔</span>
            </h2>
            <p class="text-xs text-gray-500">{{ posts.length }} publicações</p>
          </div>
        </div>

        <!-- Banner & Foto do Perfil -->
        <div class="relative">
          <div class="h-40 bg-gray-200 w-full overflow-hidden">
            <img :src="perfil.banner" class="w-full h-full object-cover" />
          </div>
          
          <!-- Botões de Ação do Perfil -->
          <div class="flex justify-end items-center gap-2 p-4">
            <button 
              @click="alternarSeguir"
              :class="seguindo ? 'border border-gray-300 text-gray-900 bg-white hover:bg-red-50 hover:text-red-600 hover:border-red-200' : 'bg-gray-900 text-white hover:bg-black'"
              class="px-5 py-1.5 rounded-full font-bold text-sm transition-all"
            >
              {{ seguindo ? 'Seguindo' : 'Seguir' }}
            </button>

            <button 
              @click="abrirModalEdicao"
              class="px-4 py-1.5 border border-gray-800 text-gray-800 rounded-full font-bold text-sm hover:bg-gray-100 transition-colors"
            >
              Editar perfil
            </button>
          </div>

          <!-- Avatar Sobreposto -->
          <div class="absolute -bottom-10 left-4">
            <img :src="perfil.foto" class="w-28 h-28 rounded-full border-4 border-white object-cover shadow-md" />
          </div>
        </div>

        <!-- Detalhes do Perfil -->
        <div class="px-4 mt-12 text-left">
          <h1 class="title-dark text-2xl font-extrabold flex items-center gap-1">
            {{ perfil.nome }} <span class="text-[#635BFF] text-base">✔</span>
          </h1>
          <p class="text-sm text-gray-500">{{ perfil.usuario }}</p>
          <p class="text-xs text-[#635BFF] font-semibold mt-1">{{ perfil.titulo }}</p>
          
          <p class="text-sm mt-3 text-gray-800 leading-normal">
            {{ perfil.bio }}
          </p>

          <div class="flex gap-4 text-xs text-gray-500 mt-3">
            <span class="flex items-center gap-1">📍 {{ perfil.localizacao }}</span>
          </div>

          <!-- Contadores Dinâmicos -->
          <div class="flex gap-4 text-sm mt-3">
            <span class="text-gray-600">
              <strong class="title-dark font-bold">{{ totalSeguindo }}</strong> Seguindo
            </span>
            <span class="text-gray-600">
              <strong class="title-dark font-bold">{{ totalSeguidores }}</strong> Seguidores
            </span>
          </div>
        </div>

        <!-- Abas/Tabs de Navegação (Agora com 3 Abas) -->
        <div class="flex border-b border-gray-200 mt-4 text-sm font-semibold text-gray-500">
          <button 
            @click="abaAtiva = 'publicacoes'" 
            :class="abaAtiva === 'publicacoes' ? 'text-gray-900 border-b-2 border-[#635BFF]' : 'hover:bg-gray-50'"
            class="flex-1 py-3 text-center transition-colors"
          >
            Publicações
          </button>
          <button 
            @click="abaAtiva = 'reposts'" 
            :class="abaAtiva === 'reposts' ? 'text-gray-900 border-b-2 border-[#635BFF]' : 'hover:bg-gray-50'"
            class="flex-1 py-3 text-center transition-colors"
          >
            Repost
          </button>
          <button 
            @click="abaAtiva = 'curtidas'" 
            :class="abaAtiva === 'curtidas' ? 'text-gray-900 border-b-2 border-[#635BFF]' : 'hover:bg-gray-50'"
            class="flex-1 py-3 text-center transition-colors"
          >
            Curtidas
          </button>
        </div>

        <!-- CONTEÚDO DAS ABAS -->

        <!-- 1. ABA PUBLICAÇÕES -->
        <div v-if="abaAtiva === 'publicacoes'" class="divide-y divide-gray-100">
          
          <!-- BOX DE CRIAR NOVA PUBLICAÇÃO -->
          <div class="p-4 border-b border-gray-100 bg-gray-50/50">
            <div class="flex gap-3">
              <img :src="perfil.foto" class="w-10 h-10 rounded-full object-cover shrink-0" />
              <div class="flex-1 space-y-2">
                <textarea 
                  v-model="novoPostTexto" 
                  rows="2" 
                  placeholder="O que você deseja compartilhar em Libras hoje?"
                  class="w-full bg-white border border-gray-200 rounded-xl p-3 text-sm focus:outline-none focus:border-[#635BFF] focus:ring-1 focus:ring-[#635BFF]"
                ></textarea>
                
                <div class="flex items-center justify-between gap-2">
                  <input 
                    v-model="novoPostMidia" 
                    type="text" 
                    placeholder="URL da imagem (opcional)"
                    class="flex-1 bg-white border border-gray-200 rounded-xl px-3 py-1.5 text-xs focus:outline-none focus:border-[#635BFF]"
                  />
                  <button 
                    @click="criarPost" 
                    class="bg-[#635BFF] text-white px-5 py-1.5 rounded-full font-bold text-xs hover:bg-[#5249e0] transition-colors shrink-0"
                  >
                    Publicar
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- LISTA DE POSTS -->
          <div v-if="posts.length === 0" class="p-8 text-center text-gray-500 text-sm">
            <p class="font-bold text-gray-700 text-base mb-1">Nenhuma publicação ainda</p>
            <p>Use o campo acima para criar sua primeira publicação!</p>
          </div>

          <article v-for="post in posts" :key="post.id" class="p-4 hover:bg-gray-50/50 flex gap-3 text-left relative group">
            <img :src="perfil.foto" class="w-10 h-10 rounded-full object-cover shrink-0" />
            <div class="flex-1">
              <div class="flex items-center justify-between">
                <div class="flex items-center gap-1 text-sm">
                  <span class="font-bold title-dark">{{ perfil.nome }}</span>
                  <span class="text-[#635BFF] text-xs">✔</span>
                  <span class="text-gray-500">{{ perfil.usuario }} · {{ post.tempo }}</span>
                </div>

                <!-- Menu Dropdown de Opções (Editar / Excluir) -->
                <div class="relative">
                  <button 
                    @click="alternarMenuPost(post.id)" 
                    class="text-gray-400 hover:text-gray-700 p-1.5 rounded-full hover:bg-gray-100 font-bold leading-none text-xs"
                  >
                    •••
                  </button>

                  <div 
                    v-if="menuPostAbertoId === post.id" 
                    class="absolute right-0 mt-1 w-44 bg-white rounded-xl shadow-lg border border-gray-100 py-1.5 z-30 text-xs"
                  >
                    <button 
                      @click="abrirModalEditarPost(post)" 
                      class="w-full text-left px-4 py-2 hover:bg-gray-50 flex items-center gap-2 text-gray-700 font-medium"
                    >
                      ✏️ Editar publicação
                    </button>
                    <button 
                      @click="excluirPost(post.id)" 
                      class="w-full text-left px-4 py-2 hover:bg-red-50 flex items-center gap-2 text-red-600 font-semibold"
                    >
                      🗑️ Excluir publicação
                    </button>
                  </div>
                </div>
              </div>

              <p class="text-sm mt-1 text-gray-800 leading-snug">
                {{ post.texto }}
              </p>
              
              <!-- Mídia na Publicação -->
              <div v-if="post.midia" class="mt-3 relative rounded-2xl overflow-hidden border border-gray-200 bg-gray-100">
                <img 
                  :src="post.midia" 
                  @error="post.midia = null"
                  class="w-full h-64 object-cover" 
                />
              </div>

              <!-- Reações Interativas -->
              <div class="flex justify-between text-xs mt-3 max-w-md items-center">
                <button @click="alternarComentario" :class="comentou ? 'text-[#635BFF]' : 'text-gray-500 hover:text-[#635BFF]'" class="flex items-center gap-1.5 group transition-colors">
                  <div class="p-2 rounded-full group-hover:bg-purple-50 flex items-center justify-center transition-colors">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M1.751 10c0-4.42 3.584-8 8.005-8h4.489c4.42 0 8.005 3.58 8.005 8 0 3.28-1.981 6.12-4.814 7.36l.243 3.09c.045.57-.481 1.01-1.025.86l-4.103-1.12c-.9.23-1.85.35-2.805.35-4.421 0-8.005-3.58-8.005-8zM9.756 4c-3.313 0-6.005 2.69-6.005 6 0 3.31 2.692 6 6.005 6 .82 0 1.63-.12 2.41-.36l.48-.15 2.37.65-.13-1.68.17-.22c2.14-2.73 1.83-6.68-.78-9.04C13.256 4.39 11.536 4 9.756 4z"/></svg>
                  </div>
                  <span class="font-medium">{{ totalComentarios }}</span>
                </button>

                <button @click="alternarRepost" :class="repostou ? 'text-green-600' : 'text-gray-500 hover:text-green-600'" class="flex items-center gap-1.5 group transition-colors">
                  <div class="p-2 rounded-full group-hover:bg-green-50 flex items-center justify-center transition-colors">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M4.5 3.88l4.42 4.42-1.42 1.42-2-2V16c0 1.1.9 2 2 2h8v2h-8c-2.21 0-4-1.79-4-4V7.71l-2 2L.08 8.3 4.5 3.88zM19.5 20.12l-4.42-4.42 1.42-1.42 2 2V8c0-1.1-.9-2-2-2h-8V4h8c2.21 0 4 1.79 4 4v8.29l2-2 1.42 1.42-4.42 4.41z"/></svg>
                  </div>
                  <span class="font-medium">{{ totalReposts }}</span>
                </button>

                <button @click="alternarCurtida" :class="curtiu ? 'text-pink-600' : 'text-gray-500 hover:text-pink-600'" class="flex items-center gap-1.5 group transition-colors">
                  <div class="p-2 rounded-full group-hover:bg-pink-50 flex items-center justify-center transition-colors">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 21.638h-.014C9.403 21.59 1.95 14.851 1.95 8.478 1.95 5.172 4.63 2.5 7.91 2.5c1.91 0 3.66.92 4.75 2.36 1.09-1.44 2.84-2.36 4.75-2.36 3.28 0 5.96 2.672 5.96 5.978 0 6.373-7.453 13.112-10.036 13.16H12zM7.91 4.5c-2.18 0-3.96 1.782-3.96 3.978 0 4.887 5.76 10.873 8.05 11.15 2.29-.277 8.05-6.263 8.05-11.15 0-2.196-1.78-3.978-3.96-3.978-1.52 0-2.91.874-3.57 2.22l-.52 1.07-.52-1.07c-.66-1.346-2.05-2.22-3.57-2.22z"/></svg>
                  </div>
                  <span class="font-medium">{{ totalCurtidas }}</span>
                </button>

                <button class="flex items-center gap-1.5 text-gray-500 hover:text-[#635BFF] group transition-colors cursor-default">
                  <div class="p-2 rounded-full group-hover:bg-purple-50 flex items-center justify-center transition-colors">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M8.75 21V3h2v18h-2zM18 21V8.5h2V21h-2zM4 21v-6h2v6H4zM13.25 21V11h2v10h-2z"/></svg>
                  </div>
                  <span class="font-medium">5,4 mil</span>
                </button>

                <button @click="alternarSalvar" :class="salvou ? 'text-[#635BFF]' : 'text-gray-500 hover:text-[#635BFF]'" class="flex items-center group transition-colors">
                  <div class="p-2 rounded-full group-hover:bg-purple-50 flex items-center justify-center transition-colors">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.59l5.7 5.7-1.41 1.41L13 6.41V16h-2V6.41L7.71 9.7 6.3 8.29 12 2.59zM21 15v5c0 1.1-.9 2-2 2H5c-1.1 0-2-.9-2-2v-5h2v5h14v-5h2z"/></svg>
                  </div>
                </button>
              </div>
            </div>
          </article>
        </div>

        <!-- 2. ABA REPOST -->
        <div v-else-if="abaAtiva === 'reposts'" class="divide-y divide-gray-100">
          <div v-if="repostou && posts.length > 0" class="p-4 hover:bg-gray-50/50 text-left">
            <p class="text-xs font-semibold text-gray-500 mb-2 flex items-center gap-1">
              🔄 {{ perfil.nome }} repostou
            </p>
            <div class="flex gap-3">
              <img :src="perfil.foto" class="w-10 h-10 rounded-full object-cover shrink-0" />
              <div class="flex-1">
                <div class="flex items-center gap-1 text-sm">
                  <span class="font-bold title-dark">{{ perfil.nome }}</span>
                  <span class="text-[#635BFF] text-xs">✔</span>
                  <span class="text-gray-500">{{ perfil.usuario }} · 2h</span>
                </div>
                <p class="text-sm mt-1 text-gray-800 leading-snug">
                  {{ posts[0].texto }}
                </p>

                <div v-if="posts[0].midia" class="mt-3 relative rounded-2xl overflow-hidden border border-gray-200 bg-gray-100">
                  <img :src="posts[0].midia" @error="posts[0].midia = null" class="w-full h-64 object-cover" />
                </div>
              </div>
            </div>
          </div>
          <div v-else class="p-8 text-center text-gray-500 text-sm">
            <p class="font-bold text-gray-700 text-base mb-1">Nenhum repost ainda</p>
            <p>Quando você clicar no botão de repostar em uma publicação, ela aparecerá aqui.</p>
          </div>
        </div>

        <!-- 3. ABA CURTIDAS -->
        <div v-else-if="abaAtiva === 'curtidas'" class="divide-y divide-gray-100">
          <div v-if="curtiu && posts.length > 0" class="p-4 hover:bg-gray-50/50 flex gap-3 text-left">
            <img :src="perfil.foto" class="w-10 h-10 rounded-full object-cover shrink-0" />
            <div class="flex-1">
              <div class="flex items-center gap-1 text-sm">
                <span class="font-bold title-dark">{{ perfil.nome }}</span>
                <span class="text-[#635BFF] text-xs">✔</span>
                <span class="text-gray-500">{{ perfil.usuario }} · 2h</span>
              </div>
              <p class="text-sm mt-1 text-gray-800 leading-snug">
                {{ posts[0].texto }}
              </p>
              <div v-if="posts[0].midia" class="mt-3 relative rounded-2xl overflow-hidden border border-gray-200 bg-gray-100">
                <img :src="posts[0].midia" @error="posts[0].midia = null" class="w-full h-64 object-cover" />
              </div>
            </div>
          </div>
          <div v-else class="p-8 text-center text-gray-500 text-sm">
            <p class="font-bold text-gray-700 text-base mb-1">Nenhuma curtida ainda</p>
            <p>Quando você curtir uma publicação, ela aparecerá nesta lista.</p>
          </div>
        </div>

      </main>

      <!-- 3. DIREITA: Widgets -->
      <aside class="w-[320px] shrink-0 p-4 space-y-4 text-left hidden lg:block">
        <div class="relative">
          <input type="text" placeholder="Buscar no Librando" class="w-full bg-gray-100 rounded-full py-2 px-4 pl-10 text-sm text-gray-900 focus:outline-none focus:bg-white focus:ring-1 focus:ring-[#635BFF] border border-transparent focus:border-[#635BFF]" />
          <span class="absolute left-3.5 top-2.5 text-gray-400 text-sm">🔍</span>
        </div>

        <div class="bg-white border border-gray-200 rounded-2xl p-4">
          <h3 class="font-bold text-base title-dark mb-3">O que está acontecendo</h3>
          <div class="space-y-3 text-xs">
            <div>
              <p class="text-gray-400">Educação · Assunto do momento</p>
              <p class="font-bold text-sm title-dark">#LibrasNaEscola</p>
              <p class="text-gray-400">4.821 publicações</p>
            </div>
            <div>
              <p class="text-gray-400">Brasil · Assunto do momento</p>
              <p class="font-bold text-sm title-dark">#DiaDoSurdo</p>
              <p class="text-gray-400">12,8 mil publicações</p>
            </div>
          </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-2xl p-4">
          <h3 class="font-bold text-base title-dark mb-3">Quem seguir</h3>
          <div class="space-y-3">
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-2 overflow-hidden">
                <img src="https://i.pravatar.cc/100?img=12" class="w-9 h-9 rounded-full object-cover shrink-0" />
                <div class="text-xs overflow-hidden">
                  <p class="font-bold title-dark truncate">Lucas Mãos</p>
                  <p class="text-gray-500 truncate">@lucasmaos</p>
                </div>
              </div>
              <button class="bg-gray-900 text-white text-xs px-4 py-1.5 rounded-full font-bold hover:bg-black transition-colors shrink-0">
                Seguir
              </button>
            </div>
          </div>
        </div>
      </aside>

    </div>

    <!-- MODAL EDITAR PERFIL -->
    <div 
      v-if="modalEdicaoAberta" 
      class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4 backdrop-blur-sm"
    >
      <div class="bg-white rounded-2xl w-full max-w-lg overflow-hidden shadow-2xl text-left">
        <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100">
          <div class="flex items-center gap-4">
            <button @click="fecharModalEdicao" class="text-gray-600 hover:text-black font-bold text-lg p-1 rounded-full hover:bg-gray-100">
              ✕
            </button>
            <h3 class="font-bold text-lg text-gray-900">Editar perfil</h3>
          </div>
          <button 
            @click="salvarPerfil" 
            class="bg-gray-900 text-white px-5 py-1.5 rounded-full font-bold text-sm hover:bg-black transition-colors"
          >
            Salvar
          </button>
        </div>

        <div v-if="mensagemErro" class="bg-red-50 text-red-600 px-4 py-2.5 text-xs font-semibold border-b border-red-100 flex items-center gap-1.5">
          <span>⚠️</span>
          <span>{{ mensagemErro }}</span>
        </div>

        <div class="p-4 space-y-4 max-h-[80vh] overflow-y-auto">
          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1">Nome *</label>
            <input 
              v-model="formEdicao.nome" 
              type="text" 
              class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:border-[#635BFF] focus:ring-1 focus:ring-[#635BFF]" 
            />
          </div>

          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1">Nome de utilizador (@) *</label>
            <input 
              v-model="formEdicao.usuario" 
              type="text" 
              class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:border-[#635BFF] focus:ring-1 focus:ring-[#635BFF]" 
            />
          </div>

          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1">Bio</label>
            <textarea 
              v-model="formEdicao.bio" 
              rows="3" 
              class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:border-[#635BFF] focus:ring-1 focus:ring-[#635BFF]"
            ></textarea>
          </div>

          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1">Localização</label>
            <input 
              v-model="formEdicao.localizacao" 
              type="text" 
              class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:border-[#635BFF] focus:ring-1 focus:ring-[#635BFF]" 
            />
          </div>

          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1">URL da Foto de Perfil</label>
            <input 
              v-model="formEdicao.foto" 
              type="text" 
              class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:border-[#635BFF] focus:ring-1 focus:ring-[#635BFF]" 
            />
          </div>

          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1">URL da Capa / Banner</label>
            <input 
              v-model="formEdicao.banner" 
              type="text" 
              class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:border-[#635BFF] focus:ring-1 focus:ring-[#635BFF]" 
            />
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL EDITAR PUBLICAÇÃO -->
    <div 
      v-if="modalEditarPostAberta" 
      class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4 backdrop-blur-sm"
    >
      <div class="bg-white rounded-2xl w-full max-w-lg overflow-hidden shadow-2xl text-left">
        <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100">
          <div class="flex items-center gap-4">
            <button @click="modalEditarPostAberta = false" class="text-gray-600 hover:text-black font-bold text-lg p-1 rounded-full hover:bg-gray-100">
              ✕
            </button>
            <h3 class="font-bold text-lg text-gray-900">Editar publicação</h3>
          </div>
          <button 
            @click="salvarEdicaoPost" 
            class="bg-[#635BFF] text-white px-5 py-1.5 rounded-full font-bold text-sm hover:bg-[#5249e0] transition-colors"
          >
            Salvar
          </button>
        </div>

        <div class="p-4 space-y-4">
          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1">Texto da publicação</label>
            <textarea 
              v-model="textoPostEditando" 
              rows="3" 
              class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:border-[#635BFF] focus:ring-1 focus:ring-[#635BFF]"
            ></textarea>
          </div>

          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1">URL da Imagem</label>
            <input 
              v-model="midiaPostEditando" 
              type="text" 
              placeholder="Cole a URL da imagem (ou deixe em branco para remover)"
              class="w-full border border-gray-300 rounded-xl p-2.5 text-sm focus:outline-none focus:border-[#635BFF] focus:ring-1 focus:ring-[#635BFF]" 
            />
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'

const abaAtiva = ref('publicacoes')
const mensagemErro = ref('')

// Perfil do usuário
const perfilPadrao = {
  nome: 'Ana Silva',
  usuario: '@anasilva_libras',
  titulo: 'Entusiasta de Libras',
  bio: 'Aprendendo e compartilhando a cultura surda 🤟 | Conectando pessoas através de Libras.',
  localizacao: 'Brasília, Brasil',
  foto: 'https://i.pravatar.cc/150?img=47',
  banner: 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=800&q=80'
}

const perfil = reactive({ ...perfilPadrao })

// Form de Criar Novo Post
const novoPostTexto = ref('')
const novoPostMidia = ref('')

// Lista Reativa de Posts
const posts = ref([
  {
    id: 1,
    texto: 'A Libras não é apenas uma língua, é identidade, cultura e conexão. Hoje aprendi um sinal novo e quero compartilhar com vocês! #LibrasParaTodos',
    tempo: '2h',
    midia: 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=800&auto=format&fit=crop'
  }
])

function criarPost() {
  if (!novoPostTexto.value || novoPostTexto.value.trim() === '') return

  const novo = {
    id: Date.now(),
    texto: novoPostTexto.value.trim(),
    tempo: 'Agora mesmo',
    midia: novoPostMidia.value.trim() || null
  }

  posts.value.unshift(novo)
  localStorage.setItem('librando_posts', JSON.stringify(posts.value))

  novoPostTexto.value = ''
  novoPostMidia.value = ''
}

const seguindo = ref(false)
const totalSeguindo = ref(1200)
const totalSeguidores = ref(350)

const curtiu = ref(false)
const totalCurtidas = ref(178)

const repostou = ref(false)
const totalReposts = ref(42)

const comentou = ref(false)
const totalComentarios = ref(24)

const salvou = ref(false)

// Controle do Menu de Opções de cada Post (•••)
const menuPostAbertoId = ref(null)

function alternarMenuPost(id) {
  menuPostAbertoId.value = menuPostAbertoId.value === id ? null : id
}

// Modal Editar Post
const modalEditarPostAberta = ref(false)
const postSendoEditado = ref(null)
const textoPostEditando = ref('')
const midiaPostEditando = ref('')

function abrirModalEditarPost(post) {
  postSendoEditado.value = post
  textoPostEditando.value = post.texto
  midiaPostEditando.value = post.midia || ''
  modalEditarPostAberta.value = true
  menuPostAbertoId.value = null
}

function salvarEdicaoPost() {
  if (postSendoEditado.value) {
    postSendoEditado.value.texto = textoPostEditando.value
    postSendoEditado.value.midia = midiaPostEditando.value.trim() || null
    localStorage.setItem('librando_posts', JSON.stringify(posts.value))
  }
  modalEditarPostAberta.value = false
}

// Excluir Post
function excluirPost(id) {
  posts.value = posts.value.filter(p => p.id !== id)
  localStorage.setItem('librando_posts', JSON.stringify(posts.value))
  menuPostAbertoId.value = null
}

onMounted(() => {
  const perfilSalvo = localStorage.getItem('librando_perfil')
  if (perfilSalvo) {
    Object.assign(perfil, JSON.parse(perfilSalvo))
  }

  const postsSalvos = localStorage.getItem('librando_posts')
  if (postsSalvos) {
    posts.value = JSON.parse(postsSalvos)
  }

  const reacoesSalvas = localStorage.getItem('librando_reacoes')
  if (reacoesSalvas) {
    const data = JSON.parse(reacoesSalvas)
    curtiu.value = data.curtiu
    totalCurtidas.value = data.totalCurtidas
    repostou.value = data.repostou
    totalReposts.value = data.totalReposts
    comentou.value = data.comentou
    totalComentarios.value = data.totalComentarios
    salvou.value = data.salvou
    seguindo.value = data.seguindo ?? false
    totalSeguidores.value = data.totalSeguidores ?? 350
    totalSeguindo.value = data.totalSeguindo ?? 1200
  }
})

function salvarEstadoReacoes() {
  localStorage.setItem('librando_reacoes', JSON.stringify({
    curtiu: curtiu.value,
    totalCurtidas: totalCurtidas.value,
    repostou: repostou.value,
    totalReposts: totalReposts.value,
    comentou: comentou.value,
    totalComentarios: totalComentarios.value,
    salvou: salvou.value,
    seguindo: seguindo.value,
    totalSeguidores: totalSeguidores.value,
    totalSeguindo: totalSeguindo.value
  }))
}

function alternarSeguir() {
  seguindo.value = !seguindo.value
  seguindo.value ? totalSeguidores.value++ : totalSeguidores.value--
  salvarEstadoReacoes()
}

function alternarCurtida() {
  curtiu.value = !curtiu.value
  curtiu.value ? totalCurtidas.value++ : totalCurtidas.value--
  salvarEstadoReacoes()
}

function alternarRepost() {
  repostou.value = !repostou.value
  repostou.value ? totalReposts.value++ : totalReposts.value--
  salvarEstadoReacoes()
}

function alternarComentario() {
  comentou.value = !comentou.value
  comentou.value ? totalComentarios.value++ : totalComentarios.value--
  salvarEstadoReacoes()
}

function alternarSalvar() {
  salvou.value = !salvou.value
  salvarEstadoReacoes()
}

// Modal de Edição do Perfil
const modalEdicaoAberta = ref(false)
const formEdicao = reactive({ ...perfil })

function abrirModalEdicao() {
  mensagemErro.value = ''
  Object.assign(formEdicao, perfil)
  modalEdicaoAberta.value = true
}

function fecharModalEdicao() {
  modalEdicaoAberta.value = false
}

function salvarPerfil() {
  const nomeVazio = !formEdicao.nome || formEdicao.nome.trim() === ''
  const usuarioVazio = !formEdicao.usuario || formEdicao.usuario.trim() === ''

  if (nomeVazio && usuarioVazio) {
    mensagemErro.value = 'Os campos Nome e Nome de utilizador (@) são obrigatórios.'
    return
  }

  if (nomeVazio) {
    mensagemErro.value = 'O campo Nome é obrigatório.'
    return
  }

  if (usuarioVazio) {
    mensagemErro.value = 'O campo Nome de utilizador (@) é obrigatório.'
    return
  }

  if (!formEdicao.usuario.startsWith('@')) {
    formEdicao.usuario = '@' + formEdicao.usuario.trim()
  }

  mensagemErro.value = ''
  Object.assign(perfil, formEdicao)
  localStorage.setItem('librando_perfil', JSON.stringify(perfil))
  modalEdicaoAberta.value = false
}
</script>

<style scoped>
.brand-logo {
  color: #635BFF !important;
}

.title-dark {
  color: #1A1A1A !important;
}

.perfil-page h1,
.perfil-page h2,
.perfil-page h3 {
  opacity: 1 !important;
}
</style>