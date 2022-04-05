<template>
  <div :class="`text-${field.textAlign}`">
    <template v-if="hasValue">
      <div v-if="field.asHtml" v-html="field.value"></div>
      <template v-else>
        <tooltip v-if="isTrimmed && showTooltip" trigger="hover">
          <a
            v-if="hasUrl"
            :href="field.url"
            :target="field.target"
            class="whitespace-no-wrap no-underline dim text-primary font-bold"
          >
            {{ trimmedValue }}
          </a>
          <tooltip-content
            slot="content"
            v-html="field.value"
          ></tooltip-content>
        </tooltip>
        <span v-else>
          <a
            v-if="hasUrl"
            :href="field.url"
            :target="field.target"
            class="whitespace-no-wrap no-underline dim text-primary font-bold"
            >{{ trimmedValue }}</a
          >
          <span v-else class="whitespace-no-wrap">{{ trimmedValue }}</span>
        </span>
      </template>
    </template>
    <p v-else>&mdash;</p>
  </div>
</template>

<script>
import Tooltip from "../../../../../laravel/nova/resources/js/components/Tooltip.vue";
export default {
  components: { Tooltip },
  props: ["resourceName", "field"],

  computed: {
    /**
     * Determine if the field has a value other than null.
     */
    hasValue() {
      return this.field.value !== null;
    },

    hasUrl() {
      return this.field.url !== null;
    },

    isTrimmed() {
      if (this.field.trim > 0 && this.field.value.length > this.field.trim) {
        return true;
      }

      return false;
    },

    trimmedValue() {
      if (this.isTrimmed) {
        return this.field.value.substr(0, this.field.trim) + " ...";
      }

      return this.field.value;
    },

    showTooltip() {
      if (!"hideTooltip" in this.field) {
        return false;
      }

      return !this.field.hideTooltip;
    },
  },
};
</script>
