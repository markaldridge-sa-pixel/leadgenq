  <template>
    <form>
      <div 
       v-for="(step, index) in steps" 
       :key="index" 
       :id="'step'+(index+1)" 
       v-show="activeStepIndex===index"
       class="vue-form-step">
  
         <slot :name="'step'+(index+1)" />
  
       </div>
    </form>
  </template>
  <script>

const props = defineProps(['steps']);
let activeStepIndex = ref(0);

</script>