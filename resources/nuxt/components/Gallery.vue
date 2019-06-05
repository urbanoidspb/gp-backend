<template>
    <section class="gallery" :style="{background:backgroundImageStyle}">
        <h2>{{galleryPhotos.length}} фото</h2>
        <span class="data">{{galleryTime}}</span>
        <router-link :to="{ path: '/gallery/' + galleryId }"></router-link>
    </section>
</template>

<script>

export default {
    name: 'Gallery',
    props: {
        galleryId: Number,
        galleryTime: String,
        galleryPhotos: Array,
    },
    computed: {
        backgroundImageStyle() {
            if (this.galleryPhotos[0]) {
                var path = this.galleryPhotos[0].path;
                return {
                    backgroundImage: 'url(' + path + ')',
                    backgroundPosition: '50% 50%',
                    backgroundRepeat: 'no-repeat'
                }   
            }
            
            return {};
        },
    }
}
</script>

<style scoped>
    .gallery {
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
        padding: 0.5rem 1rem;
        position: relative;
    }

    h2 {
        font-weight: 500;
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }

    span {
        font-size: 0.8rem;
    }

    a {
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    @media (max-width: 992px) {
         .gallery {
            padding: 1rem 1.5rem;
        }
        h2 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        span {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 650px) {
         .gallery {
            padding: 1.1rem 2rem;
        }
        h2 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        span {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 420px) {
        .gallery {
            height: 30vw;
            padding: 1rem 2rem;
        }
        h2 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        span {
            font-size: 1.5rem;
        }
    }
</style>