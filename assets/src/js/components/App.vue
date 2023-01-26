<template>
  <div class="w-full h-full flex items-center justify-center">
    <div class="w-full h-5/6 mx-4 md:w-1/2 md:h-2/3 bg-white rounded shadow-md">
      <upload-photo v-if="step==='upload-photo'"></upload-photo>
      <select-frame v-if="step==='select-frame'"></select-frame>
      <custom-photo v-if="step==='custom-photo'"></custom-photo>
      <select-background v-if="step==='select-background'"></select-background>
      <custom-background v-if="step==='custom-background'"></custom-background>
    </div>
  </div>
</template>

<script>
import uploadPhoto from "./UploadPhoto";
import selectFrame from "./SelectFrame";
import customPhoto from "./CustomPhoto.vue";
import selectBackground from "./SelectBackground";
import customBackground from "./CustomBackground";
import {mapGetters} from 'vuex';

export default {
  components: {
    uploadPhoto,
    selectFrame,
    customPhoto,
    selectBackground,
    customBackground,
  },
  data() {
    return {};
  },
  computed: {
    ...mapGetters(['step'])
  },
  created() {
    this.$store.dispatch('currency_symbol');
  },
  methods: {}
}
</script>

<style scoped>

</style>