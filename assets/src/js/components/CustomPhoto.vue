<template>
  <div class="w-full h-full">
    <div class="model-title">
      <div class="title-btn absolute"><i @click="back()" class="fas fa-arrow-left"></i></div>
      <div class="title-name">
        {{ currency_symbol }} {{ select_frame.price }}
        <p>{{ select_frame.name }}</p>
      </div>
    </div>
    <div>

    </div>
    <div>

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
    ...mapGetters(['currency_symbol', 'select_frame', 'select_avatar'])
  },
  created() {
  },
  methods: {
    back(e) {
      this.$store.dispatch('step', 'select-frame');
    }
  }
}
</script>

<style scoped>

</style>