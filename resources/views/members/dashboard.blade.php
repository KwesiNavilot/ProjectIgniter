@extends('layouts.members')

@section('title', 'Dashboard | UTAG-UCC Welfare')

@section('content')
    <h1 class="page-header font-weight-bold mb-3">{{ $greeting }}, {{ Auth::user()->firstname }}</h1>

    <div class="fs-20 mb-4">
        Welcome to the UTAG-UCC Welfare Portal.
    </div>

    <section id="claims" class="section">
        <div class="section-title mb-4">
            <h4>Request A Benefit</h4>
        </div>

        <div class="row icon-boxes">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <a href="#">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="ri-stack-line"></i>
                        </div>

                        <h4 class="title text-center">
                            <span>Birth of Child</span>
                        </h4>

                        <p class="description">
                            Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi
                        </p>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <a href="#">
                    <div class="icon-box">
                    <div class="icon">
                        <i class="ri-palette-line"></i>
                    </div>

                    <h4 class="title text-center">
                        <span>Death of Spouse</span>
                    </h4>

                    <p class="description">
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                    </p>
                </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <a href="#">
                    <div class="icon-box">
                    <div class="icon">
                        <i class="ri-command-line"></i>
                    </div>

                    <h4 class="title text-center">
                        <span>Death of Parent</span>
                    </h4>

                    <p class="description">
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    </p>
                </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <a href="#">
                    <div class="icon-box">
                    <div class="icon">
                        <i class="ri-fingerprint-line"></i>
                    </div>

                    <h4 class="title text-center">
                        <span>Death of Member</span>
                    </h4>

                    <p class="description">
                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                    </p>
                </div>
                </a>
            </div>
        </div>
    </section>
@endsection
