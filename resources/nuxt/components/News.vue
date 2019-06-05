<template>
    <section class="news" :style="backgroundImageStyle">
        <h2>{{title}}</h2>
        <span class="news_data">{{NewsItemDate}}</span>
        <router-link :to="{ path: '/news/' + NewsItemId }"></router-link>
    </section>
</template>

<script>

export default {
    name: 'News',
    components: {

    },
    props: {
        NewsItemId: Number,
        NewsItemTitle: String,
        NewsItemDate: String,
        NewsItemPhoto: Object
    },
    computed: {
        backgroundImageStyle() {
            if (this.NewsItemPhoto) {
                var path = this.NewsItemPhoto.path;
                return {
                    backgroundImage: 'url(' + path + ')',
                    backgroundPosition: '50% 50%',
                    backgroundRepeat: 'no-repeat'
                }   
            }
            
            return {};
        },
        title() {
            return this.NewsItemTitle.slice(0,27) + this.ellipsis
        },   
        ellipsis() {
            var el;
           return (this.NewsItemTitle.length > 27) ? el = "..." : el = '';
        }
    }
}
</script>

<style scoped>
    .news {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 0;
        width: 100%;
        height: 12vw;
        border-radius: 15px;
        font-family: 'Rubik', sans-serif;
        color: white;
        box-shadow: inset -12px -181px 95px -72px rgba(0,0,0,0.75);
        background-size: cover  !important;
        padding: 1rem 1rem;
        position: relative;
    }

    h2 {
        text-decoration: underline; 
        font-weight: 500;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    a {
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    .news_data {
        font-size: 0.8rem;
    }

    @media (max-width: 576px) {
        .news {
            padding: 1.5rem 2rem;
        }
        h2 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }
        .news_data {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 420px) {
        .news {
            height: 30vw;
            padding: 1rem 2rem;
        }
        h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        .news_data {
            font-size: 1.1rem;
        }
    }
</style>
