<template>
<div>
  <div class="wrapper">
    <Contacts/>
    <no-ssr>
      <Navbar id="Navbar"/>
    </no-ssr>

    <section class="gallery">
        <h2 class="title">Галерея</h2>
        <main>
            <div class="main_item"  v-for="gallery in galleries.slice(0, this.galleriesOnPage)" v-bind:key="gallery.id" >
                <Gallery v-bind:gallery-id="gallery.id" v-bind:gallery-photos="gallery.photos" v-bind:gallery-time="gallery.time"/>
                <h2 class="name">{{funcTitle(gallery.title)}}</h2>
            </div>
        </main>
        <div class="showallRow">
            <button v-on:click="galleriesOnPage += 6" v-if="!(this.galleriesOnPage >= galleries.length)" class="showall" to="/about">Показать ещё</button>
        </div>
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
import Gallery from '~/components/Gallery.vue'
import Footer from '~/components/Footer.vue'

export default {
  components: {
    Contacts,
    Navbar,
    Gallery,
    Footer
  },
  data() {
    return {
         galleriesOnPage: 6
    }
  },
  async asyncData ({store}) {
      await store.dispatch('actSetGalleries');
      return {
        galleries: store.getters.getGalleries
    }
  },

  methods: {
    ellipsis(title) {
        var el;
        return (title.length > 40) ? el = "..." : el = '';
    },
    funcTitle(title) {
            return title.toString().slice(0,40) + this.ellipsis(title.toString())
        },
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

.gallery .title {
    text-align: center;
    font-size: 3rem;
    margin-top: 4rem;
}

.gallery main,
.showallRow {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-gap: 4vw 2vw;
  margin: 5vw 0;
}

.main_item > h2 {
    margin-top: 0.5rem;
    font-size: 1.4rem;
    font-weight: 500;
    text-decoration: underline;    
}

.gallery .showall {
    grid-column: 2/3;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1.5rem;
    padding: 0.7rem 1.2rem;
    background: transparent;
    font-family: 'Rubik', sans-serif;
    border: 1px solid #023C71;
    border-radius: 100px;
    text-decoration: none;
    color: #023C71;
    font-weight: 500;
    outline: none;
    cursor: pointer;
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
  html {
    font-size: 4px;
  }
  #Navbar {
    margin-bottom: 2vw;
  }
}

@media (max-width: 420px) {
  .wrapper {
  grid-template-columns: 0.5fr repeat(12, 1fr) 0.5fr;
  }
  html {
  font-size: 6px;
  }
  .gallery main {
    grid-template-columns: 1fr 1fr;
    grid-gap: 4vw;
    margin: 10vw 0;
  }  
  .main_item > h2 {
    margin-top: 0.5rem;
    font-size: 2rem;   
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