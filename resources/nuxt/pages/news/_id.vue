<template>
<div>
  <div class="wrapper">
    <Contacts/>
    <no-ssr>
      <Navbar id="Navbar"/>
    </no-ssr>

    <section class="news">
        <h2 class="title">{{NewsItem.title}}</h2>
        <article>
            <img :src="photoSrc(NewsItem.photos)" alt="">
            <p>
                {{NewsItem.text}}
            </p>
        </article>
        <section class="another_news">
            <header>
                <h3>Другие новости</h3>
            </header>
            <main>
                <News v-for="NewsItem in news.slice(0, 3)" v-bind:key="NewsItem.id" v-bind:news-item-id="NewsItem.id" v-bind:news-item-title="NewsItem.title" v-bind:news-item-date="NewsItem.created_at" v-bind:news-item-photo="NewsItem.photos[0]"/>
            </main>
        </section>
    </section>
    </div>
    <div class="background">
        <Footer id="Footer"/>
    </div>

    <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(53837686, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/53837686" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

  </div>
</template>

<script>
import Contacts from '~/components/Contacts.vue'
import Navbar from '~/components/Navbar.vue'
import News from '~/components/News.vue'
import Footer from '~/components/Footer.vue'

export default {
  components: {
    Contacts,
    Navbar,
    News,
    Footer
  },
  computed: {
    NewsItem() {
      return this.news.find((NewsItem) => NewsItem.id == this.$route.params.id)
    }
  },
  methods: {
    photoSrc(photos) {
      if (photos[0] !== undefined) {
        return photos[0].path
      }
    }
  },
  async asyncData ({store}) {
    await store.dispatch('actSetNews');
      return {
        news: store.getters.getNews
    }
  },
}
</script>

<style>
html {
  font-size: 16px;
}
.wrapper {
  display: grid;
  grid-template-columns: 1fr repeat(12, 1fr) 1fr;
  font-family: 'Rubik', sans-serif;
}

.wrapper > * {
  grid-column: 2/14;
}

.news .title {
    text-align: center;
    font-size: 3rem;
    margin: 4rem 0;
}

.news article {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  margin-bottom: 5vw;
}

.news article img {
    grid-column: 2/6;
    width: 100%;
}

.news article p {
    font-size: 1.5rem;
    grid-column: 2/6;
    margin: 2vw 0;
    line-height: 2.5rem;
}

.another_news header h3 {
  text-align: center;
  font-size: 2rem;
}

.another_news main {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-gap: 2vw;
  margin: 3vw 0 3vw;
}

.background {
  width: 100%;
  background: #0C6293;
  grid-column: 1/15;
  display: grid;
  grid-template-columns: 1fr repeat(12, 1fr) 1fr;
}

#Footer {
  grid-column: 2/14;
}

@media (min-width: 1920px) {
  html {
  font-size: 16px;
  }
}

@media (max-width: 1675px) {
  html {
  font-size: 15px;
  }
}

@media (max-width: 1575px) {
  html {
  font-size: 14px;
  }
}

@media (max-width: 1475px) {
  html {
  font-size: 13px;
  }
}

@media (max-width: 1375px) {
  html {
  font-size: 12px;
  }
}

@media (max-width: 1275px) {
  html {
  font-size: 11px;
  }
}

@media (max-width: 1175px) {
  html {
  font-size: 10px;
  }
}

@media (max-width: 1075px) {
  html {
  font-size: 9px;
  }
}

@media (max-width: 975px) {
  html {
  font-size: 8px;
  }
}

@media (max-width: 885px) {
  html {
  font-size: 7px;
  }
}

@media (max-width: 775px) {
  html {
  font-size: 6px;
  }
}

@media (max-width: 650px) {
  html {
  font-size: 5px;
  }
}

@media (max-width: 576px) {
  #Navbar {
    margin-bottom: 2vw;
  }
  html {
  font-size: 4px;
  }
}

@media (max-width: 420px) {
  .wrapper {
  grid-template-columns: 0.5fr repeat(12, 1fr) 0.5fr;
}
  html {
  font-size: 6px;
  }
  .another_news main {
    grid-template-columns: 1fr 1fr;
    grid-gap: 4vw;
    margin: 4vw 0;
  }  
  .news article img {
    grid-column: 1/7;
  }

  .news article p {
    grid-column: 1/7;
    margin: 5vw 0 2vw;
    font-size: 2.2rem;
  }
  .another_news header h3 {
    font-size: 2.5rem;
  }
  #Navbar {
    margin-bottom: 5vw;
  }
}

@media (max-width: 360px) {
  html {
  font-size: 5px;
  }
}

@media (min-width: 420px) and (orientation: portrait) { 
 .background {
   margin-top: 30vh;
  }
}

@media (max-width: 1175px) and (orientation: portrait) { 
 .background {
   margin-top: 45vh;
  }
}

</style>