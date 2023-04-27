<template>
  <div class="flex items-center justify-between px-15 py-15 md:justify-center">
            <Link class="mt-2" href="/">
          <Logo width="300" height="300"/>
            </Link>
            </div>
  <div class="lg:grid lg:grid-cols-2 lg:gap-6 bg-white shadow border-black-050 border">
   
    <div class="lg:col-span-1">
      <form class="w-full max-w-lg m-auto" @submit="submit">
        <div v-if="step === 1" class="max-w-3xl bg-white rounded-md shadow overflow-hidden">


          <div class="flex-wrap -mb-8 p-8">
            <div class="row-start-1">
              <h1 class="pl-15 pr-15 pt-25 mb-8 text-3xl font-bold text-center w-full justify-center">I need flooring for
              </h1>
            </div>
            <div class="row-start-2 flex justify-center">
              <funnel-button @click="nextStep1" onclick="resetSQM" class="btn-indigo ml-0-auto justify-center"
                type="submit">Residential</funnel-button>
              <funnel-button @click="nextStep1" onclick="resetSQM" :funnelB="form.processing"
                class="btn-indigo ml-0-auto justify-center" type="submit">Commercial</funnel-button>
            </div>
          </div>
          <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">

          </div>


        </div>
        <div v-if="step === 2" class="max-w-3xl bg-white rounded-md shadow overflow-hidden">


          <div class="flex flex-wrap -mb-8 p-8">
            <h1 class="pl-15 pr-15 pt-25 mb-8 text-3xl font-bold text-center w-full justify-center">Contact Info</h1>

            <text-input v-model="form.first_name" :error="form.errors.first_name" class="pb-8 pr-6 w-full lg:w-1/1"
              label="First name" />
            <text-input v-model="form.last_name" :error="form.errors.last_name" class="pb-8 pr-6 w-full lg:w-1/1"
              label="Last name" />

            <text-input v-model="form.email" :error="form.errors.email" class="pb-8 pr-6 w-full lg:w-1/1" label="Email" />
            <text-input v-model="form.phone" :error="form.errors.phone" class="pb-8 pr-6 w-full lg:w-1/1" label="Phone" />

            <text-input v-model="form.city" :error="form.errors.city" class="pb-8 pr-6 w-full lg:w-1/1" label="City" />
            <text-input v-model="form.region" :error="form.errors.region" class="pb-8 pr-6 w-full lg:w-1/1"
              label="Province/State" />

          </div>
          <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100 ml-0-auto justify-center">
            <slot name="footer">
              <loading-button @click="prevStep1" class="btn-indigo mr-auto" type="submit">Back</loading-button>
              <loading-button @click="nextStep2" class="btn-indigo ml-auto" type="submit">Next</loading-button>
            </slot>
          </div>


        </div>
        <div v-if="step === 3" class="max-w-3xl bg-white rounded-md shadow overflow-hidden">


          <div class="flex-wrap -mb-8 p-8">
            <div class="row-start-1">
              <h1 class="pl-25 pr-25 pt-25 mb-8 text-3xl font-bold text-center">I Need</h1>
            </div>
            <div class="row-start-2 flex">
              <div class="col-start-1">
                <funnel-button @click="nextStep3" :funnelB="form.processing" class="btn-indigo ml-0-auto justify-center"
                  type="submit">Interior</funnel-button>
              </div>
              <div class="col-start-2">
                <funnel-button @click="nextStep3" :funnelB="form.processing" class="btn-indigo ml-0-auto justify-center"
                  type="submit">Exterior</funnel-button>
              </div>
              <!-- <div class="col-start-3">
              <funnel-button @click="nextStep3" :funnelB="form.processing"
                class="btn-indigo ml-0-auto justify-center" type="submit">Both</funnel-button></div>-->
            </div>
          </div>
          <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
            <slot name="footer">
              <loading-button @click="prevStep2" class="btn-indigo mr-auto" type="submit">Back</loading-button>
            </slot>
          </div>
        </div>
        <div v-if="step === 4" class="max-w-3xl bg-white rounded-md shadow overflow-hidden">


          <div class="flex flex-wrap -mb-8 p-8">
            <h1 class="pl-15 pr-15 pt-25 mb-8 text-3xl font-bold text-center w-full justify-center">The number of square
              meters I need floored is</h1>
            <funnel-button @click.prevent="nextStep4" :funnelB="form.processing" class="btn-indigo ml-0-auto justify-center" type="submit">Labour<br>Less than 40 sqm</funnel-button>
            <funnel-button @click.prevent="nextStep4" :funnelB="form.processing" :labourmin="220" :labourmax="310" :sqmetersMin="40"
              :sqmetersMax="100" :onClick="fourzero" class="btn-indigo ml-0-auto justify-center" type="submit">40 - 100 sqm</funnel-button>
            <funnel-button @click.prevent="nextStep4" :funnelB="form.processing" :labourmin="220" :labourmax="310" :sqmetersMin="101"
              :sqmetersMax="250" :onClick="onezerozero" class="btn-indigo ml-0-auto justify-center" type="submit">101 - 250 sqm</funnel-button>
            <funnel-button @click.prevent="nextStep4" :funnelB="form.processing" :labourmin="220" :labourmax="310" :sqmetersMin="251"
              :sqmetersMax="500" :onClick="twofifty" class="btn-indigo ml-0-auto justify-center" type="submit">251+ sqm</funnel-button>

          </div>
          <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
            <slot name="footer">
              <loading-button @click="prevStep3" class="btn-indigo mr-auto" type="submit">Back</loading-button>
            </slot>
          </div>


        </div>
        <div v-if="step === 5" class="max-w-3xl bg-white rounded-md shadow overflow-hidden">


          <div class="flex flex-wrap -mb-8 p-8">
            <h1 class="pl-15 pr-15 pt-25 mb-8 text-3xl font-bold text-center w-full justify-center">The floor finish is
            </h1>
            <funnel-button @click.prevent="finalStep" :funnelB="form.processing" :onClick="epoxyPrice"
              class="btn-indigo ml-0-auto justify-center" type="submit">Epoxy/Polyurethane</funnel-button>
            <funnel-button @click.prevent="finalStep" :funnelB="form.processing" :onClick="cementPrice"
              class="btn-indigo ml-0-auto justify-center" type="submit">Cement</funnel-button>
            <funnel-button @click.prevent="nextStep7" :funnelB="form.processing"
              class="btn-indigo ml-0-auto justify-center" type="submit">Tiles</funnel-button>
            <funnel-button @click.prevent="nextStep5" :funnelB="form.processing"
              class="btn-indigo ml-0-auto justify-center" type="submit">Vinyl</funnel-button>

          </div>
          <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
            <slot name="footer">
              <loading-button @click.prevent="prevStep4" class="btn-indigo mr-auto" type="submit">Back</loading-button>
            </slot>
          </div>
        </div>
        <div v-if="step === 6" class="max-w-3xl bg-white rounded-md shadow overflow-hidden">


          <div class="flex flex-wrap -mb-8 p-8">
            <h1 class="pl-15 pr-15 pt-25 mb-8 text-3xl font-bold text-center w-full justify-center">I will source my own
              Vinyl</h1>
            <funnel-button @click.prevent="nextStep8" :funnelB="form.processing" :onClick="ownVinylYes" class="btn-indigo ml-0-auto"
              type="submit">Yes</funnel-button>
            <funnel-button @click.prevent="nextStep8" :funnelB="form.processing" :onClick="ownVinylNo" class="btn-indigo ml-0-auto"
              type="submit">No</funnel-button>


          </div>
          <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
            <slot name="footer">
              <loading-button @click.prevent="prevStep5" class="btn-indigo mr-auto" type="submit">Back</loading-button>
            </slot>
          </div>



        </div>
        <div v-if="step === 7" class="max-w-3xl bg-white rounded-md shadow overflow-hidden">

          <div class="flex flex-wrap -mb-8 p-8">
            <h1 class="pl-15 pr-15 pt-25 mb-8 text-3xl font-bold text-center w-full justify-center">T Currently my floor has
            </h1>
            <funnel-button @click.prevent="finalStep" :funnelB="form.processing"
              class="btn-indigo ml-0-auto justify-center" type="submit">Flooring to be removed(tiles, wood, paving
              etc)</funnel-button>
            <funnel-button @click.prevent="nextStep10" :funnelB="form.processing"
              class="btn-indigo ml-0-auto justify-center" type="submit">Bare Cement</funnel-button>


          </div>
          <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
            <slot name="footer">
              <loading-button @click.prevent="prevStep6" class="btn-indigo mr-auto" type="submit">Back</loading-button>
            </slot>
          </div>


        </div>
        <div v-if="step === 8" class="max-w-3xl bg-white rounded-md shadow overflow-hidden">


          <div class="flex flex-wrap -mb-8 -mr-6 p-8">
            <h1 class="pl-15 pr-15 pt-25 mb-8 text-3xl font-bold text-center w-full justify-center">I will source my own
              Tiles</h1>
            <funnel-button @click.prevent="nextStep6" 
             :funnelB="form.processing" 
             :onClick="ownTilesYes" 
             class="btn-indigo ml-0-auto justify-center" type="submit">Yes</funnel-button>
            <funnel-button @click.prevent="finalStep" 
             :funnelB="form.processing"
             :onClick="ownTilesNo"
             class="btn-indigo ml-0-auto justify-center" type="submit">No</funnel-button>

          </div>

          <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
            <slot name="footer">
              <loading-button @click.prevent="prevStep7" class="btn-indigo mr-auto" type="submit">Back</loading-button>
            </slot>
          </div>


        </div>
        <div v-if="step === 9" class="max-w-3xl bg-white rounded-md shadow overflow-hidden">


          <div class="flex flex-wrap -mb-8 -mr-6 p-8">
            <h1 class="pl-15 pr-15 pt-25 mb-8 text-3xl font-bold text-center w-full justify-center">V Currently my floor has
            </h1>
            <funnel-button @click.prevent="finalStep" :funnelB="form.processing"
              class="btn-indigo ml-0-auto justify-center" type="submit">Flooring to be removed</funnel-button>
            <funnel-button @click.prevent="finalStep" :funnelB="form.processing"
              class="btn-indigo ml-0-auto justify-center" type="submit">Bare Cement</funnel-button>


          </div>
          <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
            <slot name="footer">
              <loading-button @click.prevent="prevStep8" class="btn-indigo mr-auto" type="submit">Back</loading-button>
            </slot>
          </div>


        </div>
      <!--  <div v-if="step === 10" class="max-w-3xl bg-white rounded-md shadow overflow-hidden">

          <div class="flex flex-wrap -mb-8 -mr-6 p-8">
            <h1 class="pl-15 pr-15 pt-25 mb-8 text-3xl font-bold text-center w-full justify-center">I would like</h1>
            <funnel-button @click="finalStep" :funnelB="form.processing" :onClick="good" 
              class="btn-indigo ml-0-auto justify-center" type="submit">Good </funnel-button>
            <funnel-button @click="finalStep" :funnelB="form.processing" :onClick="better"
              class="btn-indigo ml-0-auto justify-center" type="submit">Better</funnel-button>
            <funnel-button @click="finalStep" :funnelB="form.processing" :onClick="best"
              class="btn-indigo ml-0-auto justify-center" type="submit">Best</funnel-button>

          </div>
          <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100 ml-0-auto justify-center">
            <slot name="footer">
              <loading-button @click.prevent="prevStep8" class="btn-indigo mr-auto" type="submit">Back</loading-button>
              <loading-button @click.prevent="finalStep" class="btn-indigo ml-auto" type="submit">Submit</loading-button>
            </slot>
          </div>


        </div> -->

        <div v-if="step === 11" class="max-w-3xl bg-white rounded-md shadow overflow-hidden">


          <div class="flex flex-wrap -mb-8 -mr-6 p-8">
            <h1 class="pl-15 pr-15 pt-25 mb-8 text-3xl font-bold text-center w-full justify-center">Thank you for your
              interest</h1>
            <p>A more accurate quote will be provided, if you wish to do another estimate kindly click on redo button.</p>


          </div>
          <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100 ml-0-auto justify-center">
            <slot name="footer">
             
              <loading-button @click.prevent="doAnother" :onClick="resetSQM" class="btn-indigo mr-auto" type="submit">Start Over</loading-button>
              <loading-button @click.prevent="submitForm" class="btn-indigo ml-auto" type="submit">Get Official Quote</loading-button>
            </slot>
          </div>


        </div>

      </form>
    </div>

    <div class="lg:col-span-1 pt-6 bg-yellowtint text-center">
      <h1 class="estimate-heading font-bold text-center"> Estimate Value </h1>
      <p>This is just a rough estimate for a accurate quote please complete form and we will be in touch.</p>
      <h4 v-if="step === 3 && total !== 0" class="estimate-heading font-bold text-center">Labour Under 40 Sqm <br>R {{ total }}.00</h4>
      <h4 v-if="step === 3 && total1 !== 0" class="estimate-heading font-bold text-center">Labour 40 - 100 Sqm <br>R {{ total1 }}.00</h4>
      <h4 v-if="step === 3 && total2 !== 0" class="estimate-heading font-bold text-center">Labour 101 - 250 Sqm <br>R {{ total2 }}.00</h4>
      <h4 v-if="step === 3 && total3 !== 0" class="estimate-heading font-bold text-center">Labour 250+ Sqm <br>R {{ total3 }}.00</h4>
      <span>-----------------------------</span>
      <h4 v-if="step === 5 && labour !== 0 || step===5 || step === 4" class="estimate-heading font-bold text-center">Labour: R {{ labour
      }}.00</h4>
      <h4 v-if="step === 11 && floorFinish2 !== 0" class="estimate-heading font-bold text-center">Epoxy: R {{ floorFinish2
      }}.00</h4>
      <h4 v-if="step === 11 && floorFinish1 !== 0" class="estimate-heading font-bold text-center">Cement: R {{ floorFinish1
      }}.00</h4>
      <h4 v-if="step === 9 && floorFinish5 !== 0 || step===11" class="estimate-heading font-bold text-center">Vinyl(Lab Inc): R {{ floorFinish5
      }}.00</h4>
      <h4 v-if="step === 9 && floorFinish6 !== 0 || step===11" class="estimate-heading font-bold text-center">Labour(Vinyl): R {{ floorFinish6
      }}.00</h4>
      <h4 v-if="step === 7 && floorFinish7 !== 0 || step===11" class="estimate-heading font-bold text-center">Tiles(Lab Inc): R {{ floorFinish7
      }}.00</h4>
      <h4 v-if="step === 7 && floorFinish8 !== 0 || step===11" class="estimate-heading font-bold text-center">Labour(Tiles): R {{ floorFinish8
      }}.00</h4>

      <!--   <h1 v-if="step === 10 || step===11 && good !== 0-0" class="estimate-heading font-bold text-center">Good R {{ good
      }}.00</h1>
              <h1 v-if="step === 10 || step===11 && better !== 0-0" class="estimate-heading font-bold text-center">Better R {{ better
      }}.00</h1>
              <h1 v-if="step === 10 || step===11 && best !== 0-0" class="estimate-heading font-bold text-center">Best R {{ best
      }}.00</h1> -->

    </div>

  </div>
</template>
<script>

import LeadformLayout from '@/Shared/LeadformLayout'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'
import FunnelButton from '@/Shared/FunnelButton'
import TrashedMessage from '@/Shared/TrashedMessage'
import Logo from '@/Shared/Logo'
import { router } from '@inertiajs/vue3'




export default {
  components: {
    LoadingButton,
    FunnelButton,
    SelectInput,
    TextInput,
    TrashedMessage,
    Logo,

  },
  layout: LeadformLayout,
  props: {
    filters: Object,
    funnels: Object,
    estimates: Object,

  },

  data() {
    return {
      step: 1,
      form: this.$inertia.form({
        funnel_step1: null,
        funnel_step2: null,
        first_name: null,
        last_name: null,
        email: null,
        phone: null,
        city: null,
        region: null,
        funnel_step3: null,
        funnel_step4: null,
        funnel_step5: null,
        funnel_step6: null,
        funnel_step7: null,
        funnel_step8: null,
        funnel_step9: null,
        funnel_step10: null,
        funnel_step11: null,
        funnel_step12: null,
        funnel_step13: null,
        funnel_step14: null,
        funnel_step15: null,
        funnel_step16: null,
        funnel_step17: null,
        funnel_step18: null,
        funnel_step19: null,
        funnel_step20: null,
        funnel_step21: null,
        leadform_id: null,
      }),

      basePrice: 6500,
      maxBasePrice: 10500,
      forty100: null,
      midForty100: null,
      maxForty100: null,
      hundred250: null,
      midHundred250: null,
      maxHundred250: null,
      plus250: null,
      midPlus250: null,
      maxPlus250: null,
      minEpoxy: null,
      maxEpoxy: null,
      minCement: null,
      maxCement: null,
      minVinylwithLabour: null,
      maxVinylwithLabour: null,
      minVinylJustLabour: null,
      maxVinylJustLabour: null,
      minTileswithLabour: null,
      maxTileswithLabour: null,
      minTilesJustLabour: null,
      maxTilesJustLabour: null,
      sqmetersMin: null,
      sqmetersMax: null,
      goodMin: null,
      goodMax:null,
      betterMin:null,
      betterMax:null,
      bestMin:null,
      bestMax:null,
      labourmin:null,
      labourmax:null,
    }
  },

  mounted() {
    this.total
  },

  methods: {
    resetSQM() {
      this.labourmin=0;
      this.labourmax=0;
      this.sqmetersMin = 0;
      this.sqmetersMax = 0;
      this.minEpoxy= 0;
      this.maxEpoxy= 0;
      this.minCement= 0;
      this.maxCement= 0;
      this.minVinylwithLabour= 0;
      this.maxVinylwithLabour= 0;
      this.minVinylJustLabour= 0;
      this.maxVinylJustLabour= 0;
      this.minTileswithLabour= 0;
      this.maxTileswithLabour= 0;
      this.minTilesJustLabour= 0;
      this.maxTilesJustLabour= 0;
      this.sqmetersMin= 0;
      this.sqmetersMax= 0;
      this.goodMin= 0;
      this.goodMax= 0;
      this.betterMin= 0;
      this.betterMax= 0;
      this.bestMin= 0;
      this.bestMax= 0;
      this.floorFinish1= 0;
      this.floorFinish2= 0;
      this.floorFinish5= 0;
      this.floorFinish6= 0;
      this.floorFinish7= 0;
      this.floorFinish8= 0;
    },
    zero() {
      this.sqmetersMin = 1;
      this.sqmetersMax = 39;
    },
    fourzero() {
      this.sqmetersMin = 40;
      this.sqmetersMax = 100;
    },
    onezerozero() {
      this.sqmetersMin = 101;
      this.sqmetersMax = 250;
    },
    twofifty() {
      this.sqmetersMin = 251;
      this.sqmetersMax = 500;
    },
    cementPrice(){
      this.minEpoxy = 0;
      this.maxEpoxy = 0;
      this.minCement = 310;
      this.maxCement = 400;
    },
    epoxyPrice(){
      this.minCement = 0;
      this.maxCement = 0;
      this.minEpoxy = 220;
      this.maxEpoxy = 450;
    },
    ownTilesYes(){
      this.minTileswithLabour= 0;
      this.maxTileswithLabour=0;
      this.minTilesJustLabour= 220;
      this.maxTilesJustLabour= 380;
    },
    ownTilesNo(){
      this.minTileswithLabour= 450;
      this.maxTileswithLabour=650;
      this.minTilesJustLabour= 0;
      this.maxTilesJustLabour= 0;
      this.goodMin=80;
      this.goodMax=220;
      this.betterMin=220;
      this.betterMax=400;
      this.bestMin=400;
      this.bestMax=1300;
    },
    ownVinylYes(){
      this.minVinylwithLabour= 0;
      this.maxVinylwithLabour= 0;
      this.minVinylJustLabour=220;
      this.maxVinylJustLabour=380;
    },
    ownVinylNo(){
      this.minVinylwithLabour= 450;
      this.maxVinylwithLabour= 650;
      this.minVinylJustLabour=0;
      this.maxVinylJustLabour=0;
    },
    store() {
      this.form.post('/leads')
    },
    prevStep1() {
      this.step = 1
    },
    prevStep2() {
      this.step = 2
    },
    prevStep3() {
      this.step = 3
    },
    prevStep4() {
      this.step = 4
    },
    prevStep5() {
      this.step = 5
    },
    prevStep6() {
      this.step = 6
    },
    prevStep7() {
      this.step = 7
    },
    prevStep8() {
      this.step = 8
    },
    prevStep9() {
      this.step = 9
    },
    prevStep10() {
      this.step = 10
    },
    nextStep1() {
      // navigate to the next step of the form
      this.step = 2
    },
    nextStep2() {
      // navigate to the next step of the form
      this.step = 3

    },
    nextStep3() {
      // navigate to the next step of the form
      this.step = 4

    },
    nextStep4() {
      // navigate to the next step of the form
      this.step = 5

    },
    nextStep5() {
      // navigate to the next step of the form
      this.step = 6

    },
    nextStep6() {
      // navigate to the next step of the form
      this.step = 7

    },
    nextStep7() {
      // navigate to the next step of the form
      this.step = 8

    },
    nextStep8() {
      // navigate to the next step of the form
      this.step = 9

    },
    /*nextStep9() {
      // navigate to the next step of the form
      this.step = 10

    },*/
    finalStep() {
      // navigate to the next step of the form
      this.step = 11

    },
    submitForm() {
      // submit form data
      router.get('/leads', this.form)
    },

    doAnother() {
       // submit form data and start from step 1 again
    this.step = 1

    },

  },
  computed: {
    total() {
      return `${this.basePrice}-${this.maxBasePrice}`;
    },
    total1() {
      return `${this.forty100}-${this.maxForty100}`;
    },
    total2() {
      return `${this.hundred250}-${this.maxHunderd250}`;
    },
    total3() {
      return `${this.plus250}-${this.maxPlus250}`;
    },
    labour() {
      return `${this.labourmin * this.sqmetersMin }-${this.labourmax * this.sqmetersMax}`;
    },
    labour() {
      return `${this.labourmin * this.sqmetersMin }-${this.labourmax * this.sqmetersMax}`;
    },

    good() {
      return `${this.sqmetersMin * this.goodMin}-${this.sqmetersMax * this.goodMax}`;
 
    },
    better() {
      return `${this.sqmetersMin * this.betterMin}-${this.sqmetersMax * this.betterMax}`;
 
    },
    best() {
      return `${this.sqmetersMin * this.bestMin}-${this.sqmetersMax * this.bestMax}`;
 
    },
    floorFinish1() {
      return `${this.sqmetersMin * this.minCement}-${this.sqmetersMax * this.maxCement}`;
    },
    floorFinish2() {
      return `${this.sqmetersMin * this.minEpoxy}-${this.sqmetersMax * this.maxEpoxy}`;
    },
    floorFinish5() {
      return `${this.sqmetersMin * this.minVinylwithLabour}-${this.sqmetersMax * this.maxVinylwithLabour}`;
    },
    floorFinish6() {
      return `${this.sqmetersMin * this.minVinylJustLabour}-${this.sqmetersMax * this.maxVinylJustLabour}`;
    },
    floorFinish7() {
      return `${this.sqmetersMin * this.minTileswithLabour}-${this.sqmetersMax * this.maxTileswithLabour}`;
    },
    floorFinish8() {
      return `${this.sqmetersMin * this.minTilesJustLabour}-${this.sqmetersMax * this.maxTilesJustLabour}`;
    },


  },

}


</script>