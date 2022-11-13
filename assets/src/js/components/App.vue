<template>
  <div class="w-full h-full flex items-center justify-center">
    <div class="w-full h-5/6 mx-4 md:w-1/2 md:h-2/3 bg-white rounded shadow-md">
      <select-background></select-background>
    </div>
  </div>
</template>

<script>
import uploadPhoto from "./UploadPhoto";
import selectFrame from "./SelectFrame";
import selectBackground from "./SelectBackground";

export default {
  components: {
    uploadPhoto,
    selectFrame,
    selectBackground,
  },
  data() {
    return {};
  },
  methods: {}
}
</script>

<style scoped>

</style>