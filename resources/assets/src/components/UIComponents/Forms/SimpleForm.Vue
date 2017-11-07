<template>
	<form slot="body" @submit="makeObj">
		<div>
			<fg-input v-for="input in inputs" :key="input.name" :label="input.label" :required="true" :name="input.name" :type="input.type" :value="input.value" :placeholder="input.placeholder"></fg-input>
		</div>
		<div class="text-center">
			<button type="submit" :class="btnClass" class="btn">{{btnMsg}}</button>
		</div>
	</form>
</template>
<script>

import fgInput from 'components/UIComponents/Inputs/formGroupInput.vue';

export default {
	components: {
		fgInput
	},
	props: {
		inputs: Array,
		action: Function,
		btnMsg: String,
		btnClass: String
	},
	methods: {
		makeObj: function(event) {
			event.preventDefault();

			const obj = {};

			obj.id = Math.round(Math.random() * (10000 - 0));

			for (let index = 0; index < this.inputs.length; index++) {
				const input = this.$el[index];
				obj[input.name] = input.value;
				input.value = '';
			}

			this.action(obj);
		}
	}
}

</script>
<style>

</style>
