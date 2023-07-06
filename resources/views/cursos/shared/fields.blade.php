@php
    $disabledStr = $readonlyData ?? false ? 'disabled' : '';
@endphp

<div>
    <label for="inputAbr">Abreviatura</label>
    <input type="text" name="abreviatura" id="inputAbr" {{ $disabledStr }} value="{{ $curso->abreviatura }}">
</div>
<div>
    <label for="inputNome">Nome</label>
    <input type="text" name="nome" id="inputNome" {{ $disabledStr }} value="{{ $curso->nome }}">
</div>
<div>
    <label for="inputTipo">Tipo de Curso</label>
    <select name="tipo" id="inputTipo" {{ $disabledStr }}>
        <option {{ $curso->tipo == 'Licenciatura' ? 'selected' : '' }}>Licenciatura</option>
        <option {{ $curso->tipo == 'Mestrado' ? 'selected' : '' }}>Mestrado</option>
        <option {{ $curso->tipo == 'Curso Técnico Superior Profissional' ? 'selected' : '' }}>Curso Técnico
            Superior Profissional</option>
    </select>
</div>
<div>
    <label for="inputSemestres">Semestres</label>
    <input type="text" name="semestres" id="inputSemestres" {{ $disabledStr }} value="{{ $curso->semestres }}">
</div>
<div>
    <label for="inputECTS">ECTS</label>
    <input type="text" name="ECTS" id="inputECTS" {{ $disabledStr }} value="{{ $curso->ECTS }}">
</div>
<div>
    <label for="inputVagas">Vagas</label>
    <input type="text" name="vagas" id="inputVagas" {{ $disabledStr }} value="{{ $curso->vagas }}">
</div>
<div>
    <label for="inputContato">Contato</label>
    <input type="text" name="contato" id="inputContato" {{ $disabledStr }} value="{{ $curso->contato }}">
</div>
<div>
    <label for="inputObjetivos">Objetivos</label>
    <textarea name="objetivos" id="inputObjetivos" {{ $disabledStr }} rows=10>{{ $curso->objetivos }}
    </textarea>
</div>
