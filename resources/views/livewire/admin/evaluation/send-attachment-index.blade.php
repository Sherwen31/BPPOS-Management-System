<div>
    <div class="containerMod">
        @livewire('components.layouts.sidebar')
        <div class="mainMod" style="padding: 0;">
            <div class="sec">
                <div class="btn-toggle">
                    <button id="toggle-button">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="container">
                    <div class="greeting">
                        <h1>Good day <strong>{{ auth()->user()->first_name }} {{ auth()->user()->last_name
                                }} </strong>!
                            Please attach your file for evaluation as evidence.</h1>
                    </div>

                    <div class="form-group">
                        @php
                            $hasEvaluationRating = \App\Models\EvaluationRating::where('user_id', auth()->user()->id)
                            ->orderBy('created_at', 'desc')
                            ->first();

                            $currentMonth = Illuminate\Support\Carbon::now()->month;
                            $lastEvaluationMonth = $hasEvaluationRating?->created_at->month;
                            $canEvaluate = true;

                            if ($lastEvaluationMonth >= 1 && $lastEvaluationMonth <= 6) {
                                if ($currentMonth>= 1 && $currentMonth <= 6) {
                                    $canEvaluate = false;
                                }
                            }
                            if ($lastEvaluationMonth>= 7 && $lastEvaluationMonth <= 12) {
                                if ($currentMonth >= 7 && $currentMonth <= 12) {
                                    $canEvaluate = false;
                                }
                            }
                        @endphp
                        @if($canEvaluate)
                        <a wire:navigate href="/admin/evaluation/send-attachment/{{ auth()->user()->id }}/{{ auth()->user()->police_id }}"
                            class="send-button">
                            <span class="icon">📤</span> Submit here
                        </a>
                        @else

                        <a wire:click='alreadyHaveEvaluation' disabled
                            class="send-button-disabled">
                            <span class="icon">📤</span> Submit here
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            background: #dfe9f5;
        }

        .container {
            background-color: white;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            margin-top: 120px;
        }

        .greeting h1 {
            text-align: center;
            color: #333;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .send-button {
            width: 100%;
            padding: 12px;
            background-color: #0073e6;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            text-decoration: none;
        }

        .send-button-disabled {
            width: 100%;
            padding: 12px;
            background-color: #7eb4e9;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            text-decoration: none;
        }

        .send-button:hover {
            background-color: #005bb5;
        }

        .icon {
            margin-right: 8px;
            font-size: 18px;
        }
    </style>

    <script>
        document.addEventListener('livewire:navigated', ()=>{

            @this.on('toastr', (event) => {
                const data=event
                toastr[data[0].type](data[0].message, '', {
                closeButton: true,
                "progressBar": true,
                });
            })
        })
    </script>
</div>
