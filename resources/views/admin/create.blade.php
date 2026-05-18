<x-app-layout>
    <x-slot:title>Izveidot Viktorīnu</x-slot:title>
    <div
        x-data="{
            questions: [
                { text: '', answers: [{ text: '', is_correct: 1 }, { text: '', is_correct: 0 }, { text: '', is_correct: 0 }, { text: '', is_correct: 0 }] }
            ],
            maxQuestions: 15,
            addQuestion() {
                if (this.questions.length < this.maxQuestions) {
                    this.questions.push({
                        text: '',
                        answers: [{ text: '', is_correct: 1 }, { text: '', is_correct: 0 }, { text: '', is_correct: 0 }, { text: '', is_correct: 0 }]
                    });
                }
            },
            removeQuestion(index) {
                if (this.questions.length > 1) {
                    this.questions.splice(index, 1);
                }
            },
            setCorrect(qIndex, aIndex) {
                this.questions[qIndex].answers.forEach((a, i) => {
                    a.is_correct = (i === aIndex) ? 1 : 0;
                });
            },
        }"
        class="flex-1 flex flex-col items-center bg-gray-300 py-12 gap-8 px-4"
    >
        <div class="w-full md:w-1/2 lg:w-1/3 border-b-8 border-red-800 text-center">
            <h2 class="font-semibold text-4xl md:text-5xl lg:text-6xl text-gray-800 leading-tight">
                {{ __('Izveidot Viktorīnu') }}
            </h2>
        </div>

        <div class="w-full md:w-3/4 bg-gray-200 rounded-lg p-4 md:p-8">
            <form method="POST" action="/admin/quizzes">
                @csrf

                <div class="mb-6">
                    <input
                        type="text"
                        name="title"
                        placeholder="Viktorīnas nosaukums"
                        class="w-full bg-gray-50 rounded-lg px-4 py-3 text-gray-800 font-semibold text-lg focus:outline-none focus:border-b-4 border-red-800"
                        required
                    />
                </div>

                <template x-for="(question, qIndex) in questions" :key="qIndex">
                    <div class="bg-gray-50 rounded-lg p-4 md:p-6 mb-4">

                        <div class="flex items-center justify-between mb-4 border-b-4 border-red-800 pb-2">
                            <span class="font-semibold text-gray-800 text-base md:text-lg" x-text="'Jautājums ' + (qIndex + 1)"></span>
                            <button
                                type="button"
                                @click="removeQuestion(qIndex)"
                                x-show="questions.length > 1"
                                class="text-red-800 text-sm font-semibold hover:underline">
                                Dzēst
                            </button>
                        </div>

                        <input
                            type="text"
                            :name="'questions[' + qIndex + '][text]'"
                            x-model="question.text"
                            placeholder="Ievadiet jautājumu"
                            class="w-full bg-gray-200 rounded-lg px-4 py-2 mb-4 text-gray-800 focus:outline-none focus:border-b-4 border-red-800"
                            required
                        />

                        <template x-for="(answer, aIndex) in question.answers" :key="aIndex">
                            <div class="flex items-center gap-3 mb-2">
                                <input
                                    type="radio"
                                    :name="'correct_' + qIndex"
                                    :checked="answer.is_correct == 1"
                                    @change="setCorrect(qIndex, aIndex)"
                                    class="accent-red-800 w-4 h-4 shrink-0"
                                    title="Atzīmēt kā pareizo atbildi"
                                />
                                <input
                                    type="text"
                                    :name="'questions[' + qIndex + '][answers][' + aIndex + '][text]'"
                                    x-model="answer.text"
                                    placeholder="Atbildes variants"
                                    class="flex-1 min-w-0 bg-gray-200 rounded-lg px-3 py-2 text-gray-800 focus:outline-none focus:border-b-4 border-red-800"
                                    required
                                />
                                <input
                                    type="hidden"
                                    :name="'questions[' + qIndex + '][answers][' + aIndex + '][is_correct]'"
                                    :value="answer.is_correct"
                                />
                            </div>
                        </template>

                    </div>
                </template>

                <div class="flex flex-col md:flex-row items-stretch md:items-center gap-4 my-6">
                    <button
                        type="button"
                        @click="addQuestion"
                        :disabled="questions.length >= maxQuestions"
                        class="w-full md:w-96 h-16 bg-gray-50 hover:border-b-4 hover:bg-gray-100 border-red-800 rounded-lg font-semibold text-gray-800 disabled:opacity-40 disabled:cursor-not-allowed">
                        + Pievienot jautājumu
                    </button>
                    <span class="text-sm text-gray-600 font-semibold text-center md:text-left"
                        x-text="questions.length + ' / ' + maxQuestions + ' jautājumi'">
                    </span>
                </div>

                <button
                    type="submit"
                    class="w-full h-16 bg-gray-50 hover:border-b-4 border-red-800 hover:bg-gray-100 rounded-lg font-semibold text-gray-800 text-lg">
                    Izveidot Viktorīnu
                </button>

            </form>
        </div>
    </div>
</x-app-layout>