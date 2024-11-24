<div>
    <div class="container">
        <div class="row gy-5 gx-lg-5">
            <div class="col-md-8 blog-content mx-auto">
                <h1 class="mb-4 text-center font-weight-bold text-primary">LLena el formulario para el registro como Medico</h1>
                <form wire:submit.prevent="guardarFormulario">
                    <div class="form-group mt-4">
                        <label for="especialidad" class="font-weight-bold">Ingresa tu especialidad</label>
                        <input type="text" wire:model="especialidad" class="form-control border-primary" required>{{ old('especialidad') }}</input>
                        @error('especialidad') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="cedula" class="font-weight-bold">Ingresa tu cedula</label>
                        <input type="text" wire:model="cedula" name="cedula" id="cedula" class="form-control border-primary" required>{{ old('cedula') }}</input>
                        @error('cedula') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="consultorio" class="font-weight-bold">Agrega la direccion de tu consultorio</label>
                        <input type="text" wire:model="consultorio" class="form-control border-primary" required>{{ old('consultorio') }}</input>
                        @error('consultorio') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="acerca" class="font-weight-bold">Agrega algo acerca de ti, esta informacion aparecera en tu perfil</label>
                        <textarea wire:model="acerca" name="acerca" id="acerca" cols="30" rows="4" class="form-control border-primary" required>{{ old('acerca') }}</textarea>
                        @error('acerca') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="ruta_archivo" class="font-weight-bold">Agrega una identificacion para verificar tu identidad</label>
                        <input type="file" wire:model="ruta_archivo" class="form-control border-primary" required>
                        @error('ruta_archivo')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-md px-5 py-2">
                            <i class="fas fa-calendar-check"></i> Enviar Solicitud
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>