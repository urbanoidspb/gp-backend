import Vuex from 'vuex';
import * as axios from 'axios';
import HTTP from '../modules/http';

const creatStore = () => {
    return new Vuex.Store({
        state: {
            events: [],
            news: [],
            galleries: []
        },
        getters: {
            getEvents(state) {
                return state.events;
            },
            getNews(state) {
                return state.news;
            },
            getGalleries(state) {
                return state.galleries;
            }
        },
        mutations: {
            setEvents (state, events) {
                state.events = events;
            },
            setNews (state, news) {
                state.news = news;
            },
            setGalleries (state, galleries) {
                state.galleries = galleries;
            },
            addParticipantToEvent (state, {Event, participant}) {
              Event.participants.push(participant);
            }
        },
        actions: {
            async actSetEvents(context) {
                const req = await HTTP.get('events');
                context.commit('setEvents', req.data);
            },
            async actSetNews(context) {
                const req = await HTTP.get('news ')
                context.commit('setNews', req.data);
            },
            async actSetGalleries(context) {
                const req = await HTTP.get('albums')
                context.commit('setGalleries', req.data);
            },
            submitParticipant (context, { eventId, participant }) {
              let Event = this.state.events.find((event) => event.id == eventId);
              context.commit('addParticipantToEvent', { Event, participant});
              HTTP
                .post('events/' + eventId + '/join', participant)
            }
        }

    });
};

export default creatStore