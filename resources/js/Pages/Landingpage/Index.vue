
<template>

<FormKit
  type="form"
  #default="{ value }"
  @submit="getQuote">
  <!--Form page 1 contact info-->
<FormKit type="group" name="contactInfo">
<div class="form-body">
    <h3>Contact info</h3>
  <FormKit
    type="text"
    name="name"
    id="name"
    label="Name"
    help="Your first name"
    placeholder="“Joe”"
  />
  <FormKit
    type="text"
    name="lastname"
    id="lastname"
    label="Last Name"
    help="Your full name"
    placeholder="“Soap”"
  />
  <FormKit
      name="email"
      type="email"
      label="Email"
      help="Notice it takes a full second for the data to update."
      :delay="1000"
      validation="required|length:5|email"
      validation-visibility="live"
    />
  <FormKit
      type="tel"
      label="Phone number"
      placeholder="xxx-xxx-xxxx"
      validation="matches:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/"
      :validation-messages="{
        matches: 'Phone number must be in the format xxx-xxx-xxxx',
      }"
      validation-visibility="dirty"
    />
  </div>
  <div class="step-nav">
      <FormKit type="button" :disabled="activeStep == 'contactInfo'" @click="setStep(-1)" v-text="'Previous step'" />
      <FormKit type="button" class="next" :disabled="activeStep == 'estimate' " @click="setStep(1)" v-text="'Next step'"/>
    </div>
</FormKit>

 <!--Form page 2 Question page 1-->

 <FormKit type="group" name="Questionpage1">
<div class="form-body">
    <h3>Contact info</h3>
<!--Form row 1 start-->
<div class="form-row">
<FormKit
  type="button"
  label="funnel step"
  class="qButton"
  help="blah blah blah."
  value="logic to bring in db question field"
  @click="calcEst"
/>
<FormKit
  type="button"
  label="funnel step"
  class="qButton"
  help="blah blah blah."
  value="logic to bring in db question field"
  @click="calcEst"
/>
</div> 
<!--Form row 1 end-->
<!--Form row 2 start-->
<div class="form-row">
<FormKit
  type="button"
  label="funnel step"
  class="qButton"
  help="blah blah blah."
  value="logic to bring in db question field"
  @click="calcEst"
/>
<FormKit
  type="button"
  label="funnel step"
  class="qButton"
  help="blah blah blah."
  value="logic to bring in db question field"
  @click="calcEst"
/>
</div> 
<!--Form row 2 end-->
  </div>
  <div class="step-nav">
      <FormKit type="button" :disabled="activeStep == 'Questionpage1'" @click="setStep(-1)" v-text="'Previous step'" />
      <FormKit type="button" class="next" :disabled="activeStep == 'estimate' " @click="setStep(2)" v-text="'Next step'"/>
    </div>
</FormKit>

 <!--Form page 3 Question page 2-->

 <FormKit type="group" name="Questionpage2">
<div class="form-body">
    <h3>Contact info</h3>
<!--Form row 1 start-->
<div class="form-row">
<FormKit
  type="button"
  label="funnel step"
  class="qButton"
  help="blah blah blah."
  value="logic to bring in db question field"
  @click="calcEst"
/>
<FormKit
  type="button"
  label="funnel step"
  class="qButton"
  help="blah blah blah."
  value="logic to bring in db question field"
  @click="calcEst"
/>
</div> 
<!--Form row 1 end-->
<!--Form row 2 start-->
<div class="form-row">
<FormKit
  type="button"
  label="funnel step"
  class="qButton"
  help="blah blah blah."
  value="logic to bring in db question field"
  @click="calcEst"
/>
<FormKit
  type="button"
  label="funnel step"
  class="qButton"
  help="blah blah blah."
  value="logic to bring in db question field"
  @click="calcEst"
/>
</div> 
<!--Form row 2 end-->
  </div>
  <div class="step-nav">
      <FormKit type="button" :disabled="activeStep == 'Questionpage2'" @click="setStep(-1)" v-text="'Previous step'" />
      <FormKit type="button" class="next" :disabled="activeStep == 'estimate' " @click="setStep(3)" v-text="'Next step'"/>
    </div>
</FormKit>

<!--Form page 4 Question page 3-->

<FormKit type="group" name="Questionpage3">
<div class="form-body">
    <h3>Contact info</h3>
<!--Form row 1 start-->
<div class="form-row">
<FormKit
  type="button"
  label="funnel step"
  class="qButton"
  help="blah blah blah."
  value="logic to bring in db question field"
  @click="calcEst"
/>
<FormKit
  type="button"
  label="funnel step"
  class="qButton"
  help="blah blah blah."
  value="logic to bring in db question field"
  @click="calcEst"
/>
</div> 
<!--Form row 1 end-->
<!--Form row 2 start-->
<div class="form-row">
<FormKit
  type="button"
  label="funnel step"
  class="qButton"
  help="blah blah blah."
  value="logic to bring in db question field"
  @click="calcEst"
/>
<FormKit
  type="button"
  label="funnel step"
  class="qButton"
  help="blah blah blah."
  value="logic to bring in db question field"
  @click="calcEst"
/>
</div> 
<!--Form row 2 end-->
  </div>
  <div class="step-nav">
      <FormKit type="button" :disabled="activeStep == 'Questionpage3'" @click="setStep(-1)" v-text="'Previous step'" />
      <FormKit type="button" class="next" :disabled="activeStep == 'estimate' " @click="setStep(4)" v-text="'Next step'"/>
    </div>
</FormKit>

</FormKit>
</template>
<script>

function getEstimate(values) {
    
    console.log(values);
  }
</script>
