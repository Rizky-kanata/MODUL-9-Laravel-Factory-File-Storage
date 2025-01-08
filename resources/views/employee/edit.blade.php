@extends('layouts.app')
@section('content')
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="p-5 bg-light rounded-3 border">
                    <form action="{{ route('employees.update', ['employee' => $employee->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="text-center mb-4">
                            <i class="bi-person-circle fs-1"></i>
                            <h4>Edit Employee</h4>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input class="form-control @error('firstName') is-invalid @enderror" type="text"
                                    name="firstName" id="firstName" value="{{ old('firstName', $employee->firstname) }}"
                                    placeholder="Enter First Name">
                                @error('firstName')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input class="form-control @error('lastName') is-invalid @enderror" type="text"
                                    name="lastName" id="lastName" value="{{ old('lastName', $employee->lastname) }}"
                                    placeholder="Enter Last Name">
                                @error('lastName')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="text"
                                    name="email" id="email" value="{{ old('email', $employee->email) }}"
                                    placeholder="Enter Email">
                                @error('email')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input class="form-control @error('age') is-invalid @enderror" type="text" name="age"
                                    id="age" value="{{ old('age', $employee->age) }}" placeholder="Enter Age">
                                @error('age')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="position" class="form-label">Position</label>
                                <select name="position" id="position" class="form-select">
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}"
                                            {{ old('position', $employee->position_id) == $position->id ? 'selected' : '' }}>
                                            {{ $position->code . ' - ' . $position->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('position')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="mt-4">
                                @if ($employee->original_filename)
                                    <label for="cv" class="form-label">Curriculum Vitae (CV)</label>
                                    <h6>{{ $employee->original_filename }}</h6>
                                    <a href="{{ route('employees.download', $employee->id) }}"
                                        class="btn btn-primary btn-sm mt-2">Download CV</a>
                                    <br><br>
                                @endif
                            </div>
                            <input type="file" class="form-control" id="cv" name="cv">
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 d-grid">
                                <a href="{{ route('employees.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                        class="bi-arrow-left-circle me-2"></i> Cancel</a>
                            </div>
                            <div class="col-md-6 d-grid">
                                <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                                    Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@vite('resources/js/app.js')
