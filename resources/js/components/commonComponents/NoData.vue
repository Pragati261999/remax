<template>
  <div>
    <div class="text-center mt-5 mb-2">
      <i class="fas fa-home fa-3x"></i>
    </div>
    <div class="text-center">
        <span v-if="text" class="p-0 m-0 mt-2 text-center">{{ text }}</span>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    text: {
      type: String,
      default: "No data found.",
    },
  },
};
</script>
