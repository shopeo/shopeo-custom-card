import {createApp} from "vue";
import App from "./components/App";
import store from './store';

// console.log(current_product);
createApp(App).use(store).mount('#custom-app')
