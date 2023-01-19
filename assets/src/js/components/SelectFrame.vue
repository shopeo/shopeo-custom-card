<template>
  <div class="w-full h-full">
    <div class="model-title">
      <div class="title-btn"><i @click="back()" class="fas fa-arrow-left"></i></div>
      <div class="flex"><span class="mr-2">Skin Color:</span>
        <div class="grid grid-cols-3 gap-2 align-middle">
          <div @click="changeSkin('white')"
               class="w-12 h-8 bg-orange-100 rounded-md border-4 border-solid border-white cursor-pointer"
               :class="skin==='white'?'active':''"></div>
          <div @click="changeSkin('black')"
               class="w-12 h-8 bg-yellow-800 rounded-md border-4 border-solid border-white cursor-pointer"
               :class="skin==='black'?'active':''"></div>
          <div @click="changeSkin('yellow')"
               class="w-12 h-8 bg-orange-300 rounded-md border-4 border-solid border-white cursor-pointer"
               :class="skin==='yellow'?'active':''"></div>
        </div>
      </div>
    </div>
    <div class="flex flex-box">
      <div class="flex-none border-y-0 border-l-0 border-r border-solid border-gray-200">
        <ul class="categories-ul">
          <li class="active">All<span>{{ product_count }}</span></li>
          <li v-for="(category,index) in frame_categories">{{ category.name }}<span>{{ category.count }}</span></li>
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
      skin: 'white',
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
    changeSkin(skin) {
      this.skin = skin;
    }
  }
}
</script>

<style scoped>

</style>