<template>
	<div class="col-md-12">
		<modal :showModal="showModalAdd" :closeModal="closeModalAdd" :title="'Adicionar comunidade'">
			<simple-form slot="body" :inputs="inputs" :action="add" :btnMsg="'Adicionar'" :btnClass="'btn-fill btn-info btn-wd'">
			</simple-form>
		</modal>
		<modal :showModal="showModalUpdate" :closeModal="closeModalUpdate" :title="'Alterar comunidade'">
			<simple-form slot="body" :inputs="inputsUpdate" :action="update" :btnClass="'btn-fill btn-warning  btn-wd'" :btnMsg="'Alterar'">
			</simple-form>
		</modal>
		<button type="button" class="btn btn-success btn-fill btn-wd" data-toggle="modal" data-target="#myModal" @click="showModalAdd = true">Adicionar
			<i class="fa fa-plus" aria-hidden="true"></i>
		</button>
		<div class="card card-plain">
			<paper-table type="hover" :getId="getId" :del="del" :title="table1.title" :sub-title="table1.subTitle" :data="comunidades" :columns="table1.columns">
			</paper-table>
		</div>
	</div>

	</div>
</template>
<script>
import PaperTable from 'components/UIComponents/PaperTable.vue'
import Modal from 'components/UIComponents/Modal/Modal.vue'
import SimpleForm from 'components/UIComponents/Forms/SimpleForm.vue'
const participantesHeaders = ['Id', 'Name', 'Local', 'Missas', 'Foto'];

const inputs = [
	{
		label: 'Nome',
		name: 'name',
		type: 'text',
		value: '',
		required: true
	},
	{
		label: 'Localização',
		name: 'local',
		type: 'text',
		value: '',
		required: true
	},
	{
		label: 'Horários das Missas',
		name: 'missas',
		type: 'text',
		value: '',
		required: false
	},
	{
		label: 'Foto',
		name: 'foto',
		type: 'text',
		value: '',
		accept: 'image/x-png,image/gif,image/jpeg',
		required: true
	}
];


const comunidades = [
	{
		name: 'Teste1',
		foto: 'teste1.jpg',
		local: 'Av. Um',
		missas: '12.00',
		id: 10
	},
	{
		name: 'Teste2',
		foto: 'teste2.jpg',
		local: 'Av. Dois',
		missas: '12.00',
		id: 101
	},
	{
		name: 'Teste3',
		foto: 'teste3.jpg',
		local: 'Av. Três',
		missas: '12.00',
		id: 102
	}
];

export default {
	components: {
		PaperTable,
		Modal,
		SimpleForm
	},
	data() {
		return {
			showModalAdd: false,
			showModalUpdate: false,
			inputs: inputs,
			inputsUpdate: [],
			comunidades: comunidades,
			table1: {
				title: 'Lista de comunidades',
				subTitle: 'Aqui você ira encontrar a lista de comunidades completa',
				columns: [...participantesHeaders],
				data: [...comunidades]
			}
		}
	},
	methods: {
		closeModalAdd() {
			this.showModalAdd = false;
		},
		closeModalUpdate() {
			this.showModalUpdate = false;
		},
		add(comunidade) {
			this.comunidades.push(comunidade);
			this.showModalAdd = false;
		},
		del(id) {

			const index = this.comunidades.findIndex(comunidade => comunidade.id == id);

			if (confirm("Você tem certeza?"))
				this.comunidades.splice(index, 1);
		},
		getId(id) {
			const comunidade = this.comunidades.find(item => item.id == id);

			const inputs = [
				{
					label: 'Nome',
					name: 'name',
					type: 'text',
					value: comunidade.name,
					required: true
				},
				{
					label: 'Localização',
					name: 'local',
					type: 'text',
					value: comunidade.local,
					required: true
				},
				{
					label: 'Horários das Missas',
					name: 'missas',
					type: 'text',
					value: comunidade.missas,
					required: false
				},
				{
					label: 'Foto',
					name: 'foto',
					type: 'text',
					value: comunidade.foto,
					accept: 'image/x-png,image/gif,image/jpeg',
					required: true
				},
				{
					name: 'id',
					type: 'hidden',
					value: comunidade.id,
					required: true
				}
			];

			this.inputsUpdate = inputs;

			this.showModalUpdate = true;

		},
		update(comunidade) {
			console.log(comunidade);

			const index = this.comunidades.findIndex(item => item.id == comunidade.id);

			this.$set(this.comunidades, index, comunidade);

			this.closeModalUpdate();
		}
	}
}

</script>
<style>

</style>
