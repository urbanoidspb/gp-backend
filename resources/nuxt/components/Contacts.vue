<template>
    <section class="contacts">
        <nav class="contacts_item contacts_item_left">
            <a href="tel:+79822312466">+7(982)-231-24-66</a>
            <a href="mailto:gorod@peremen.ru">gorod@peremen.ru</a>
        </nav>
        <nav class="contacts_item contacts_item_right">
            <a href="youtube"><img src="~/assets/youtube.png" alt=""></a>
            <a href="vk"><img src="~/assets/vk.png" alt=""></a>
            <a href="inst"><img src="~/assets/insta.png" alt=""></a>
        </nav>
    </section>
</template>

<script>
export default {
    name: 'contacts'
}
</script>

<style scoped>
    a {
        padding-right: 1rem;
        text-decoration: none;
        color: #515050;
        cursor: pointer;
    }

    a:last-child {
        padding-right: 0;
    }

    .contacts {
        display: flex;
        align-items: center;
        font-family: 'Rubik', sans-serif;
        font-size: 1.125rem;
        padding: 0.3em 0;
        border-bottom: 1px solid #D6D5D5;
        margin-bottom: 0.5rem;
    }

    .contacts_item {
        display: flex;
    }

    .contacts_item_right {
        margin-left: auto;
        align-items: center;
    }

    .contacts_item_right img {
        width: 1.5rem;
        height: 1.5rem;
    }

    @media (max-width: 765px) {
        .contacts {
            display: none;
        }
    }
</style>

