<template>
    <footer>
        <ul class="footer_item nav">
            <li><router-link to="/">Главная</router-link></li>
            <li><router-link to="/about">О нас</router-link></li>
            <li><router-link to="/changes">Плафторма перемен</router-link></li>
            <li><router-link to="/events">Мероприятия</router-link></li>
            <li><router-link to="/news">Новости</router-link></li>
            <li><router-link to="/gallery">Галерея</router-link></li>
       </ul>
       <section class="footer_item contacts">
            <nav class="contacts_item contacts_item_up">
                <a href="https://www.youtube.com/channel/UCr26U87t9bCn7m4jtEhh4og" target="_blank"><img src="~/assets/footer_youtube.png" alt=""></a>
                <a href="https://vk.com/spbperemen" target="_blank"><img src="~/assets/footer_vk.png" alt=""></a>
                <a href="https://www.instagram.com/peterburggorod/" target="_blank"><img src="~/assets/footer_insta.png" alt=""></a>
            </nav>
            <nav class="contacts_item contacts_item_down">
                <p>Контактная информация:</p>
                <a href="tel:+79822312466">+7(982)-231-24-66</a>
                <a href="mailto:press@gorodperemen.spb.ru">press@gorodperemen.spb.ru</a>
            </nav>
        </section>
        <section class="footer_item poweredby">
            <img class="logo" src="~/assets/footer_logo.png" alt="">
            <p>© 2019 Петербург - город перемен</p>
            <p>powered by <span style="font-weight: 500"><a target="_blank" href="https://bonch.dev">Bonch.dev</a></span></p>
        </section>
    </footer>
</template>

<script>
export default {
    name: 'Footer'
}
</script>

<style scoped>
    footer {
        display: grid;
        width: 100%;
        grid-template-areas: "nav contacts poweredby";
        grid-template-columns: 1fr 1fr 1fr;
        grid-gap: 2vw;
        background: #0C6293;
        color: white;
        font-family: 'Rubik', sans-serif;
        font-style: normal;
        padding: 5vw 0;
        font-size: 1.125rem;
    }

    .footer_item {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .nav {
        grid-area: nav;
        align-items: flex-start;
        list-style: none;
        font-weight: 500;
        font-size: 1.2rem;
        padding: 0;
        margin: 0;
    }

    .nav li {
        padding: 0;
        margin: 0;
        margin-bottom: 1rem;
    }

    .nav a {
        color: white;
        cursor: pointer;
    }

    .nav a:hover {
        text-decoration: none;
    }

    .contacts {
        grid-area: contacts;
    }

    .contacts a {
        color: white;
        text-decoration: none;
        font-weight: 500;
    }

    .contacts_item {
        display: flex;
    }

    .contacts_item_up {
        width: 60%;
        justify-content:space-between;
        margin-bottom: 2rem;
    }

    .contacts_item_up img {
        width: 2.5rem;
        height: 2.5rem;
    }

    .contacts_item_down {
        width: 60%;
        flex-direction: column;
    }

    .contacts_item_down a,
    .contacts_item_down p {
        margin-bottom: 1rem;
    }

    .poweredby {
        grid-area: poweredby;
    }

    .poweredby img {
        width: 60%;
        margin-bottom: 1rem;
    }

    .poweredby a{
        color: #fff;
        text-decoration: none;
    }

    @media (min-width: 576px) and (max-width: 855px) {
        footer {
            font-size: 1rem;
        }

    }

    @media (max-width: 576px) {
        footer {
            grid-template-areas: "nav" "contacts" "poweredby";
            grid-template-columns: 1fr;
            grid-gap: 2vw;
            font-size: 1.5rem;
        }

        .nav {
            align-items: center;
            font-size: 2rem;
        }

        .contacts_item_up {
        width: 40%;
        }

        .poweredby img {
            width: 40%;
        }

        .contacts_item_down {
        align-items: center;
        }
    }
</style>
