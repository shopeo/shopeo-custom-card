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
          <li @click="changeCategory({slug:'all'})" :class="select_category.slug==='all'?'active':''">All<span>{{
              product_count
            }}</span></li>
          <li v-for="category in frame_categories" @click="changeCategory(category)"
              :class="select_category.slug===category.slug?'active':''">{{ category.name }}<span>{{
              category.count
            }}</span></li>
        </ul>
      </div>
      <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4 grid-box">
        <div></div>
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
      select_skin: {slug: 'white'},
      select_category: {slug: 'all'}
    };
  },
  computed: {
    ...mapGetters(['frame_categories', 'product_count', 'skins', 'frames'])
  },
  created() {
    this.loading = true;
    let that = this;
    this.$store.dispatch('frame_categories', 'frame_categories');
    this.$store.dispatch('skins', 'skins');
    this.$store.dispatch('frames', 'frames').finally(function () {
      that.loading = false;
    })
  },
  methods: {
    back(e) {
      this.$store.dispatch('step', 'upload-photo');
    },
    changeCategory(category) {
      this.select_category = category;
    },
    changeSkin(skin) {
      this.select_skin = skin;
    }
  }
}
</script>

<style scoped>

</style>