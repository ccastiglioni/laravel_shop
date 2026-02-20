<template>
    <div>
    <!-- v-bind:style="{'background-image':url( img ) }" -->
    <div class="site-blocks-cover"  v-bind:style="{'background-image': 'url(' + imagens[0] + ')'}" data-aos="fade">
      <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
          <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
            <h1 class="mb-2">Encontre seu estilo ideal</h1>
            <div class="intro-text text-center text-md-left">
              <p class="mb-4">Novidades toda semana, peças selecionadas e preços justos. Compre com segurança e receba em casa.</p>
              <p>
                <a href="/shop" class="btn btn-sm btn-primary">Comprar Agora</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm site-blocks-1">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
              <span class="icon-truck"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Entrega Rápida</h2>
              <p>Envios para todo o Brasil com rastreio e prazos claros.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-refresh2"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Troca Fácil</h2>
              <p>Primeira troca grátis dentro de 7 dias após o recebimento.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
              <span class="icon-help"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Atendimento</h2>
              <p>Suporte rápido via WhatsApp e e-mail em horário comercial.</p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section site-blocks-2">
      <div class="container">
        <div class="row">
         <div v-for="(categoria, index) in categorias" :key="index" class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
            <a class="block-2-item" href="#">
              <figure class="image crop">
                <img
                  :src="categoriaImagem(categoria)"
                  style="height:100%;width:100%;object-fit:cover"
                  class="img-fluid"
                  :alt="categoria.nome"
                >
              </figure>
              <div class="text">
                <span class="text-uppercase">Collections</span>
                <h3>{{ categoria.nome }}</h3>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Produtos em Destaque</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img :src="imagens[1]" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Camiseta Básica</a></h3>
                    <p class="mb-0">Conforto para o dia a dia</p>
                    <p class="text-primary font-weight-bold">R$ 59,90</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img :src="imagens[1]" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Jaqueta Leve</a></h3>
                    <p class="mb-0">Ideal para meia-estação</p>
                    <p class="text-primary font-weight-bold">R$ 189,90</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img :src="imagens[1]" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Polo Clássica</a></h3>
                    <p class="mb-0">Modelagem versátil</p>
                    <p class="text-primary font-weight-bold">R$ 89,90</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img :src="imagens[1]" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Tênis Casual</a></h3>
                    <p class="mb-0">Leve e fácil de combinar</p>
                    <p class="text-primary font-weight-bold">R$ 219,90</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img :src="imagens[1]" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Moletom Essencial</a></h3>
                    <p class="mb-0">Maciez para dias frios</p>
                    <p class="text-primary font-weight-bold">R$ 149,90</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-8">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Promoção da Semana</h2>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-7 mb-5">
            <a href="#"><img :src="imagens[1]" alt="Image placeholder" class="img-fluid rounded"></a>
          </div>
          <div class="col-md-12 col-lg-5 text-center pl-md-5">
            <h2><a href="/promotions">Até 30% OFF em selecionados</a></h2>
            <p class="post-meta mb-4">Válido até domingo <span class="block-8-sep">&bullet;</span> enquanto durarem os estoques</p>
            <p>Garanta peças essenciais com desconto e renove seu guarda‑roupa com economia.</p>
            <p><a href="/promotions" class="btn btn-primary btn-sm">Ver Promoções</a></p>
          </div>
        </div>
      </div>
    </div>

</div>

</template>

<script>
    export default {
        props: ['categorias', 'basePath'],
        data(){
            return {
                imagens:[
                    'imagens/hero_1.jpg',
                    'imagens/women.jpg',
                    'imagens/children.jpg',
                    'imagens/men.jpg',
                    'imagens/cloth_1.jpg',
                    'imagens/shoe_1.jpg',
                    'imagens/cloth_2.jpg',
                    'imagens/cloth_3.jpg',
                    'imagens/shoe_1.jpg',
                    'imagens/blog_1.jpg',
                ],
                //categorias_vue: this.categorias
                //categorias2: [{"id_catg":1,"nome":"Women","imagem":"admin\/images\/categorias\/vestido15-20-30.png","created_at":"2023-03-03T20:19:31.000000Z","updated_at":"2023-03-03T20:19:31.000000Z"},{"id_catg":2,"nome":"Men","imagem":"admin\/images\/categorias\/captura-de-tela-de-2022-11-01-16-31-35.png","created_at":"2023-03-04T17:56:14.000000Z","updated_at":"2023-03-04T17:56:14.000000Z"},{"id_catg":3,"nome":"Acessories","imagem":"admin\/images\/categorias\/captura-de-tela-de-2023-03-04-14-59-04.png","created_at":"2023-03-04T18:02:30.000000Z","updated_at":"2023-03-04T18:02:30.000000Z"}]
            }
        },
        mounted() {
            console.log('HOME Component mounted.',this.categorias)
        },
        methods: {
            normalizarBasePath() {
                if (!this.basePath || this.basePath === '/') {
                    return '';
                }

                return `/${String(this.basePath).replace(/^\/+|\/+$/g, '')}`;
            },
            montarPathApp(path) {
                const cleanPath = String(path).replace(/^\/+/, '');
                return `${this.normalizarBasePath()}/${cleanPath}`;
            },
            normalizarNomeCategoria(nome) {
                return String(nome || '')
                    .normalize('NFD')
                    .replace(/[\u0300-\u036f]/g, '')
                    .toLowerCase()
                    .trim();
            },
            imagemCategoriaPadrao(nome) {
                const categoria = this.normalizarNomeCategoria(nome);
                const imagens = {
                    masculino: 'imagens/men.jpg',
                    feminino: 'imagens/women.jpg',
                    acessorios: 'imagens/produtos/acessorios122.png',
                    infantil: 'imagens/children.jpg',
                    esportivo: 'imagens/shoe_1.jpg',
                    vintage: 'imagens/blog_1.jpg',
                    bolsas: 'imagens/cloth_2.jpg',
                    brinquedos: 'imagens/children.jpg',
                };

                return imagens[categoria] || null;
            },
            fallbackImage() {
                return this.montarPathApp('imagens/no-img.png');
            },
            categoriaImagem(categoria) {
                const path = categoria ? categoria.imagem : null;
                if (path) {
                    if (/^(https?:)?\/\//.test(path) || path.startsWith('data:')) {
                        return path;
                    }

                    return this.montarPathApp(path);
                }

                const imagemPadrao = this.imagemCategoriaPadrao(categoria ? categoria.nome : '');
                if (imagemPadrao) {
                    return this.montarPathApp(imagemPadrao);
                }

                return this.fallbackImage();
            }
        }
    }
</script>
