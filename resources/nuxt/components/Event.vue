<template>
    <section class="card">
        <div class="photo" :style="backgroundImageStyle">
            <span class="status">
                <div class="circ" :style="circStyle"></div>
                <span id="status" :style="statusStyle">{{statusText}}</span>
            </span>
            <router-link :to="{ path: '/events/' + eventId }"></router-link>
        </div>
        <section class="information">
            <router-link :to="{ path: '/events/' + eventId }" class="event_name">{{title}}</router-link>
            <time class="event_date">{{eventTime}}</time>
            <Modal class="сomeIn" v-bind:event-id="eventId" v-bind:event-status="eventStatus"/>
        </section>
    </section>
</template>

<script>
import Modal from '~/components/Modal.vue'

export default {
    name: 'Event',
    components: {
        Modal
    },
    props: {
        eventId: Number,
        eventTitle: String,
        eventTime: String,
        eventStatus: Boolean,
        eventPhoto: Object
    },
    computed: {
        title() {
            return this.eventTitle.slice(0,40) + this.ellipsis
        },
        backgroundImageStyle() {
            if (this.eventPhoto) {
                var path = this.eventPhoto.path;
                return {
                    backgroundImage: 'url(' + path + ')',
                    backgroundPosition: '50% 50%',
                    backgroundRepeat: 'no-repeat'
                }   
            }
            
            return {};
        },
        statusText() {
            return this.eventStatus ? "Активно" : "Закончилось"
        },
        circStyle() { 
            return {
                background: !this.eventStatus ? "#C55468" : ""
            }
        },
        statusStyle() { 
            return {
                color: !this.eventStatus ? "#C55468" : ""
            }
        },
        ellipsis() {
            var el;
           return (this.eventTitle.length > 40) ? el = "..." : el = '';
        }
    },
}
</script>

<style scoped>
    .card {
        padding: 0;
        width: 100%;
        height: 35vw;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        font-family: 'Rubik', sans-serif;
    }

    .photo > a {
        cursor: pointer;
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 2;
    }

    .photo {
        border-radius: 15px 15px 0 0;
        display: block;
        padding: 0;
        margin: 0;
        width: 100%;
        height: 55%;
        padding: 1.5rem 1rem;
        background-size: cover !important;
        position: relative;
    }

    /* <span class="status">
                <div class="circ" :style="circStyle"></div>
                <span id="status" :style="statusStyle">{{statusText}}</span>
            </span> */

    .status {
        display: inline-block;
        font-weight: 500;
        font-size: 1rem;
        padding: 0;margin: 0;
        color: #4AE0B3;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 20px;
        vertical-align: center;
    }

    .circ {
        display: inline-block;
        width: 2.5em;
        height: 2.5em;
        background: #4AE0B3;
        border-radius: 50%;
        box-shadow: 0 0 0.1em rgba(0, 0, 0, 0.5);
         vertical-align: middle;
    }

    #status {
        display: inline-block;
         vertical-align: middle;
         padding: 0 0.8rem 0 0;


    }

    .information {
        display: flex ;
        flex-direction: column;
        height: 45% !important;
        align-items: center;
        justify-content: space-between;
        padding: 1rem;
    }
    
    .information .event_name {
        width: 100%;
        text-align: center;
        font-size: 2rem;
        font-weight: 500;
        color: #323232;
    }

    .information .event_date {
        font-size: 1.5rem;
        color: black;
    }

    .information .сomeIn {
        width: 100%;
        height: 30%;
        padding: 0;
        outline: none;
        cursor: pointer;
    }

    @media (max-width: 576px) {
        .information .event_name {
            font-size: 1.8rem;
        }
        .information .сomeIn {
            font-size: 2.5rem;
        }
        .photo {
            padding: 1.5rem;
        }
    }

    @media (max-width: 420px) {
        .card {
            height: 50vw;
            border-radius: 10px;
        }
        .status {
            font-size: 1.2rem;
        }
        .information .event_name {
            font-size: 1.7rem;
        }
        .circ {
            width: 2em;
            height: 2em;
            margin-right: 0.3rem;
        }
        .photo {
            padding: 1.5rem 1.5rem;
            border-radius: 10px 10px 0 0;
        }
        .information .event_date {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 350px) {
        .information .event_name {
            font-size: 2rem;
        }
        .information .event_date {
            font-size: 1.5rem;
        }
        .information {
            padding: 1rem;
        }
        .photo {
            padding: 1.5rem;
        }
    }
</style>
