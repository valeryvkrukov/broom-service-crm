<template>
    <LocaleSwitcher position="absolute"/>
    <div class="row vh-100">
        <div class="col-sm-6 text-black align-self-center">
            <div class="px-5 ms-xl-4">
                <!--i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i-->
                <img src="/images/logo.jpg" style="object-fit: cover; object-position: left;"/>
            </div>
            <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                <form style="width: 23rem;">
                    <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">{{ $t('auth.login') }}</h3>
                    <div class="form-outline mb-4">
                        <input type="email" id="form2Example18" class="form-control form-control-lg" />
                        <label class="form-label" for="form2Example18">{{ $t('auth.email') }}</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="password" id="form2Example28" class="form-control form-control-lg" />
                        <label class="form-label" for="form2Example28">{{ $t('auth.password') }}</label>
                    </div>
                    <div class="pt-1 mb-4">
                        <button class="btn btn-info btn-lg btn-block" type="button">{{ $t('auth.login') }}</button>
                    </div>
                    <!--p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                    <p>Don't have an account? <a href="#!" class="link-info">Register here</a></p-->
                </form>
            </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block align-self-center">
            <img src="/images/auth-background.jpg" class="w-100" style="object-fit: cover; object-position: left;">
        </div>
    </div>
</template>

<script setup>
    import LocaleSwitcher from '../LocaleSwitcher';
</script>