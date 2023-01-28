<template>
  <div class="w-full h-full">
    <div class="model-title">
      <div class="title-btn"><i @click="back()" class="fas fa-arrow-left"></i></div>
      <div class="flex"><span class="mr-2">Skin Color:</span>
        <div class="grid grid-cols-3 gap-2 align-middle">
          <div v-for="skin in skins" :style="{'background-color':skin.color}" @click="changeSkin(skin)"
               class="w-12 h-8 rounded-md border-4 border-solid border-white cursor-pointer"
               :class="select_skin.slug===skin.slug?'active':''"></div>
        </div>
      </div>
    </div>
    <div class="flex flex-box">
      <div class="flex-none border-y-0 border-l-0 border-r border-solid border-gray-200">
        <ul class="categories-ul">
          <li @click="changeCategory({slug:'all',term_id: 0})" :class="select_category.slug==='all'?'active':''">
            All<span>{{
              product_count
            }}</span></li>
          <li v-for="category in frame_categories" @click="changeCategory(category)"
              :class="select_category.slug===category.slug?'active':''">{{ category.name }}<span>{{
              category.count
            }}</span></li>
        </ul>
      </div>
      <div v-if="!loading" class="flex-1 grid grid-cols-2 md:grid-cols-4 gap-4 p-4 grid-box">
        <img v-for="(frame,index) in frames" @click="selectFrame(frame)" :src="frame.image">
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
      loading: false,
      select_skin: {slug: 'all', term_id: 0},
      select_category: {slug: 'all', term_id: 0}
    };
  },
  computed: {
    ...mapGetters(['frame_categories', 'product_count', 'skins', 'frames'])
  },
  created() {
    this.$store.dispatch('frame_categories');
    this.$store.dispatch('skins');
    this.loadFrames();
  },
  methods: {
    back(e) {
      this.$store.dispatch('step', 'upload-photo');
    },
    changeCategory(e) {
      this.select_category = {
        term_id: e.term_id,
        slug: e.slug
      };
      this.loadFrames();
    },
    changeSkin(e) {
      this.select_skin = {
        term_id: e.term_id,
        slug: e.slug
      };
      this.loadFrames();
    },
    loadFrames() {
      let that = this;
      this.loading = true;
      this.$store.dispatch('frames', {
        category: this.select_category.term_id,
        skin: this.select_skin.term_id
      }).finally(function () {
        that.loading = false;
      });
    },
    selectFrame(e) {
      this.$store.dispatch('select_frame', {
        id: e.id,
        name: e.name,
        price: e.price,
        image: e.image
      });
      this.$store.dispatch('step', 'custom-photo');
    }
  }
}
</script>

<style scoped>

</style>