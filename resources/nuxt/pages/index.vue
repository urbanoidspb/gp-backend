<template>
<div>
  <div class="wrapper">
    <Contacts/>
    <no-ssr>
      <Navbar id="Navbar"/>
    </no-ssr>
    <section class="joinUs">
      <img src="~/assets/main_background.png" alt="">
      <h2>Проектная площадка</h2>
      <h1>"Петербург - город перемен"</h1>
      <miniModal class="Particip"/>
      <p>*Форма заполняемая личными данными</p>
    </section>

    <section class="home_steps">
      <div class="home_step">
        <img src="~/assets/step1.png" alt="">
        <h3>Подай заявку</h3>
      </div>
      <div class="home_step">
        <img src="~/assets/step2.png" alt="">
        <h3>Защити проект</h3>
      </div>
      <div class="home_step">
        <img src="~/assets/step3.png" alt="">
        <h3>Получи поддержку</h3>
      </div>
    </section>

    <section class="home_events">
        <header>
          <h2>Мероприятия</h2>
          <router-link to="/events">Все мероприятия</router-link>
        </header>
        <main>
          <Event class="event_block" v-for="event in events.slice(0, 3)" v-bind:key="event.id" v-bind:event-id="event.id" v-bind:event-title="event.title" v-bind:event-time="event.time" v-bind:event-status="event.is_relevant" v-bind:event-photo="event.photos[0]"/>
        </main>
    </section>

    <section class="home_news">
        <header>
          <h2>Новости</h2>
          <router-link to="/news">Все новости</router-link>
        </header>
        <main>
          <News class="news_block" v-for="NewsItem in news.slice(0, 3)" v-bind:key="NewsItem.id" v-bind:news-item-id="NewsItem.id" v-bind:news-item-title="NewsItem.title" v-bind:news-item-date="NewsItem.created_at" v-bind:news-item-photo="NewsItem.photos[0]"/>
        </main>
    </section>
    </div>

    <div class="stand_background">
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
import News from '~/components/News.vue'
import Footer from '~/components/Footer.vue'
import miniModal from '~/components/miniModal.vue'

export default {
  components: {
    Contacts,
    Navbar,
    Event,
    News,
    Footer,
    miniModal
  },
  async asyncData ({store}) {
      await store.dispatch('actSetEvents');
      await store.dispatch('actSetNews');
      return {
        events: store.getters.getEvents,
        news: store.getters.getNews
    }
  }
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

.joinUs {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-end;
  width: 100%;
  font-size: 2rem;
  color: #1B1B1B;
}

.joinUs > img {
  width: 100%;
  margin: -3rem 0;
  z-index: -1;
}

.joinUs h1 {
  margin: 0 0 3rem;
}

.joinUs h2 {
  font-weight: 500;
  
}

.joinUs .SignInButton {
  display: flex;
  justify-content: center;
  align-items: center;
  font-weight: bold;
  font-size: 2.5rem;
  background: #71D5A2;
  padding: 1rem 2rem;
  border: none;
  border-radius: 100px;
  text-decoration: none;
  color: white;
  outline: none;
  cursor: pointer;
}

.Particip {
  font-weight: bold;
}

.joinUs p {
  margin: 0.625rem 0;
  font-size: 0.825rem;
  color: #515050;
}

.home_steps {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-gap: 1vw;
  margin: 5vw 0;
}

.home_step {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.home_step img {
  width: 70%;
}

.home_step h3 {
  font-size: 2rem;
  padding: 2rem 0;
  font-weight: normal;
  text-align: center;
}

.home_events header,
.home_news header {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.home_events header h2,
.home_news header h2 {
  font-size: 2.7rem;
  font-weight: 500;
}

.home_events header a,
.home_news header a {
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
}

.home_events main,
.home_news main {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-gap: 2vw;
  margin: 2vw 0;
}

.stand_background {
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

@media (max-width: 840px) {
  .joinUs > img {
  margin: -1.7rem 0;
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
  .joinUs > img {
  margin: -1.5rem 0;
  }
}

@media (max-width: 420px) {
  .wrapper {
  grid-template-columns: 0.5fr repeat(12, 1fr) 0.5fr;
}
  html {
  font-size: 6px;
  }
  .home_events main,
  .home_news main {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 2vw;
  }  
  #Navbar {
    padding-bottom: 8rem;
  }
  .event_block:last-child,
.news_block:last-child {
  display: none !important;
}
  .home_events main,
  .home_news main {
    display: grid;
    grid-gap: 3vw;
    margin: 3vw 0;
  }  
  .steps {
    margin: 10vw 0;
  }
  .joinUs > img {
  margin: -1rem 0;
  }
  .joinUs p {
    font-size: 1rem;
  } 
}

@media (max-width: 360px) {
  html {
  font-size: 5px;
  }
}

</style>

