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
      <div v-if="!loading" class="grid grid-cols-4 md:grid-cols-8 gap-4 mt-2">
        <img v-for="(avatar,index) in avatars" @click="selectImage(avatar)" :src="avatar">
      </div>
      <div v-if="loading" class="w-full flex justify-center items-center">
        <img style="height: 80px;"
             src="/wp-content/plugins/shopeo-custom-card/assets/images/loading.gif">
      </div>
    </div>
  </div>
</template>

<script>
import {mapGetters} from 'vuex';

export default {
  data() {
    return {
      loading: false
    };
  },
  computed: {
    ...mapGetters(['current', 'avatars'])
  },
  created() {
    this.loading = true;
    let that = this;
    this.$store.dispatch('avatars').finally(function () {
      that.loading = false;
    });
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
        this.loading = true;
        let that = this;
        let file = e.target.files[0];
        this.$store.dispatch('file', file);
        this.$store.dispatch('uploadAvatar', file).finally(function () {
          that.$store.dispatch('avatars').finally(function () {
            that.loading = false;
          });
        });
      }
    },
    selectImage(select_avatar) {
      this.$store.dispatch('select_avatar', select_avatar);
      this.$store.dispatch('step', 'select-frame');
    },
    clear(e) {
      this.loading = true;
      let that = this;
      this.$store.dispatch('clear').finally(function () {
        that.$store.dispatch('avatars').finally(function () {
          that.loading = false;
        });
      });
    }
  }
}
</script>

<style scoped>

</style>