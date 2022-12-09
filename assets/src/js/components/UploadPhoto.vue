<template>
  <div class="w-full h-full">
    <div class="model-title">
      <div class="title-btn absolute"><i @click="close" class="fas fa-xmark"></i></div>
      <div class="title-name">Choose Photos Source</div>
    </div>
    <div class="my-4 px-4">
      <input ref="file-input" type="file" accept=".jpg,.jpeg,.png" class="hidden" @change="upload">
      <button @click="selectFile" class="w-full">Choose from your album</button>
    </div>
    <div class="p-4 pt-0">
      <div class="flex justify-between"><h5>Images Records (Click To Use)</h5><a class="px-2" href="javascript:;"
                                                                                 @click="clear">Clear All</a></div>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

      </div>
    </div>
  </div>
</template>

<script>
import {mapGetters} from 'vuex';

export default {
  data() {
    return {};
  },
  computed: {
    ...mapGetters(['current', 'avatars'])
  },
  created() {
    this.$store.dispatch('avatars');
  },
  methods: {
    close(e) {
      document.getElementById('custom-app').style.display = "none";
    },
    selectFile(e) {
      this.$refs['file-input'].click();
    },
    upload(e) {
      if (e.target.files && e.target.files[0]) {
        let file = e.target.files[0];
        this.$store.dispatch('uploadAvatar', file);
      }
    },
    clear(e) {
      this.$store.dispatch('clear');
    }
  }
}
</script>

<style scoped>

</style>