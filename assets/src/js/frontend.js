import {createApp} from "vue";
import App from "./components/App";
import store from './store';
// console.log(shopeo_custom_card_frontend);

createApp(App).use(store).mount('#custom-app')
