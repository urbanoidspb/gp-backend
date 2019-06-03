<template>
<div>
  <div class="wrapper">
    <Contacts/>

    <no-ssr>
      <Navbar id="Navbar"/>
    </no-ssr>

    <section class="events">
        <h2 class="title">{{Event.title}}</h2>
        <h3 class="status" v-if="!Event.is_relevant">Акция завершена</h3>
        <article>
            <img :src="photoSrc(Event.photos)" alt="">
            <p>
                {{Event.description}}
            </p>
            <div class="ModalRow">
              <Modal id="Modal" v-bind:event-id="Event.id" v-bind:event-status="Event.is_relevant"/>
            </div>
        </article>
        <section class="another_events">
            <header>
                <h3>Мероприятия</h3>
            </header>
            <main>
                <Event v-for="event in events.slice(0, 3)" v-bind:key="event.id" v-bind:event-id="event.id" v-bind:event-title="event.title" v-bind:event-time="event.time" v-bind:event-status="event.is_relevant" v-bind:event-photo="event.photos[0]"/>
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
import Event from '~/components/Event.vue'
import Modal from '~/components/Modal.vue'
import Footer from '~/components/Footer.vue'

export default {
  components: {
    Contacts,
    Navbar,
    Modal,
    Event,
    Footer
  },
  computed: {
    Event() {
      return this.events.find((event) => event.id == this.$route.params.id)
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
    await store.dispatch('actSetEvents');
      return {
        events: store.getters.getEvents
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
  grid-template-columns: 4fr repeat(12, 1fr) 4fr;
  font-family: 'Rubik', sans-serif;
}

.wrapper > * {
  grid-column: 2/14;
}

.events .title {
    text-align: center;
    font-size: 3rem;
    margin: 4rem 0 1rem;
    font-weight: 500;
}

.events > .status {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 1rem;
    font-weight: 500;
    color: #CC203F;
}

.events article {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  margin-bottom: 5vw;
}

.events article img {
    grid-column: 2/6;
    width: 100%;
}

.events article p {
    font-size: 1.5rem;
    grid-column: 2/6;
    margin: 2vw 0;
    line-height: 2.5rem;
}

.ModalRow {
  width: 100%;
  height: 3.5rem;
  grid-column: 3/5;
  text-align: center;
}

article #Modal {
    height: 100%;
    color: white;
    font-weight: 500;
    outline: none;
}

.another_events header h3 {
  text-align: center;
  font-size: 2rem;
}

.another_events main {
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
  grid-template-columns: 4fr repeat(12, 1fr) 4fr;
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
  grid-template-columns: 1fr repeat(12, 1fr) 1fr;
}
  html {
  font-size: 6px;
  }
  .another_events main {
    grid-template-columns: 1fr 1fr;
    grid-gap: 4vw;
    margin: 4vw 0;
  }  
  article button {
    grid-column: 2/6;
    font-size: 2rem;
    padding: 1rem 0;
  }

  .events .title {
    margin: 4rem 0 2rem;
  }

  .events article img {
    grid-column: 1/7;
  }

.events article p {
    grid-column: 1/7;
    margin: 5vw 0;
  }

  .another_events header h3 {
    text-align: center;
    font-size: 2.5rem;
  }

  article #Modal {
    grid-column: 3/5;
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