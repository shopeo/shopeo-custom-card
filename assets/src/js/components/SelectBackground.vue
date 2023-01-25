<template>
  <div class="w-full h-full">
    <div class="model-title">
      <div class="title-btn absolute"><i @click="back()" class="fas fa-arrow-left"></i></div>
      <div class="title-name">Background Choose</div>
    </div>
    <div class="flex flex-box">
      <div class="flex-none border-y-0 border-l-0 border-r border-solid border-gray-200">
        <ul class="categories-ul">
          <li @click="changeCategory({slug:'all',term_id: 0})" :class="select_category.slug==='all'?'active':''">
            All<span>{{
              background_count
            }}</span></li>
          <li v-for="category in background_categories" @click="changeCategory(category)"
              :class="select_category.slug===category.slug?'active':''">{{ category.name }}<span>{{
              category.count
            }}</span></li>
        </ul>
      </div>
      <div class="flex-1 grid grid-cols-2 md:grid-cols-4 gap-4 p-4 grid-box">
        <img v-for="(background,index) in backgrounds" @click="selectBackground(background)" :src="background.image">
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
import backgrounds from "../store/modules/backgrounds";

export default {
  data() {
    return {
      loading: false,
      select_category: {slug: 'all', term_id: 0}
    };
  },
  computed: {
    ...mapGetters(['background_categories', 'background_count', 'backgrounds'])
  },
  created() {
    this.$store.dispatch('background_categories');
    this.loadBackgrounds();
  },
  methods: {
    backgrounds() {
      return backgrounds
    },
    back(e) {
      this.$store.dispatch('step', 'select-frame');
    },
    changeCategory(e) {
      this.select_category = {
        term_id: e.term_id,
        slug: e.slug
      };
      this.loadBackgrounds();
    },
    loadBackgrounds() {
      let that = this;
      this.loading = true;
      this.$store.dispatch('backgrounds', {
        category: this.select_category.term_id,
      }).finally(function () {
        that.loading = false;
      });
    },
    selectBackground(e) {
      console.log(e);
      this.$store.dispatch('select_background', {
        id: e.id,
        name: e.name,
        price: e.price,
        image: e.image
      });
      this.$store.dispatch('step', 'custom-background');
    }
  }
}
</script>

<style scoped>

</style>