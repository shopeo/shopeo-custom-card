import {createStore, createLogger} from "vuex";
import avatar from "./modules/avatar";
import backgrounds from "./modules/backgrounds";
import frames from "./modules/frames";
import workflow from "./modules/workflow";

const debug = process.env.NODE_ENV !== 'production'
export default createStore({
    modules: {
        workflow,
        frames,
        backgrounds,
        avatar
    },
    strict: debug,
    plugins: debug ? [createLogger()] : []
})