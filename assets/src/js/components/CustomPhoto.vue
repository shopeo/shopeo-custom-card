<template>
  <div class="w-full h-full flex flex-col">
    <div class="model-title">
      <div class="title-btn absolute"><i @click="back()" class="fas fa-arrow-left"></i></div>
      <div class="title-name">
        <span v-html="currency_symbol"></span>{{ select_frame.price }}
        <small class="small-title">{{ select_frame.name }}</small>
      </div>
    </div>
    <div class="grow">
      <div class="h-full flex">
        <div ref="box" class="relative w-auto h-5/6 md:w-1/2 md:h-auto m-auto"
             style="background: url('/wp-content/plugins/shopeo-custom-card/assets/images/meshwork-bg.svg') left top repeat">
          <img :src="select_frame.image" class="w-full">
          <img class="avatar_box absolute top-2 left-2" ref="avatar_box" :src="select_avatar">
          <Moveable
              className="moveable"
              v-bind:target="['.avatar_box']"
              v-bind:draggable="true"
              v-bind:scalable="true"
              v-bind:rotatable="true"
              v-bind:keep-ratio="true"
              v-bind:throttle-scale="0.1"
              v-bind:snappable="true"
              v-bind:bounds="bounds"
              @drag="onDrag"
              @scale="onScale"
              @rotate="onRotate"
          />
        </div>
      </div>
    </div>
    <div class="p-4 bg-gray-100 rounded-b">
      <button @click="onConfirm" class="w-full">CONFIRM</button>
    </div>
    <canvas ref="canvas" class="hidden"></canvas>
  </div>
</template>

<script>
import Moveable, {VueMoveableInstance} from "vue3-moveable";
import {mapGetters} from 'vuex';
import {useElementSize} from '@vueuse/core'

export default {
  components: {
    Moveable
  },
  data() {
    return {
      bounds: {
        left: 0,
        top: 0,
        right: 0,
        bottom: 0
      }
    };
  },
  computed: {
    ...mapGetters(['currency_symbol', 'select_frame', 'select_avatar'])
  },
  created() {
  },
  mounted() {
    const {width, height} = useElementSize(this.$refs.box);
    this.bounds.right = width;
    this.bounds.bottom = height;
  },
  methods: {
    back(e) {
      this.$store.dispatch('step', 'select-frame');
    },
    onDrag({transform}) {
      console.log(transform);
      this.$refs.avatar_box.style.transform = transform;
    },
    onScale({drag}) {
      console.log(drag.transform);
      this.$refs.avatar_box.style.transform = drag.transform;
    },
    onRotate({drag}) {
      console.log(drag.transform);
      this.$refs.avatar_box.style.transform = drag.transform;
    },
    onConfirm(e) {
      let transform = this.$refs.avatar_box.style.transform;
      console.log(transform);
      console.log(this.$refs.avatar_box.translate);
      let canvas = this.$refs.canvas;
      canvas.width = this.bounds.right;
      canvas.height = this.bounds.bottom;
      let ctx = canvas.getContext('2d');
      let avatar = new Image();
      avatar.onload(function (e) {
        ctx.drawImage(this);
        console.log(canvas.toDataURL('image/png'));
      });
      let bg = new Image();
      bg.onload = function (e) {
        ctx.drawImage(this, 0, 0, canvas.width, canvas.height);
        console.log(canvas.toDataURL('image/png'));
        avatar.src = this.select_avatar;
      }
      bg.src = this.select_frame.image;
    }
  }
}
</script>

<style scoped>

</style>