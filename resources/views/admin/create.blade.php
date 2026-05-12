<x-app-layout>
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
    >
        <form method="POST" action="/admin/quizzes">
            @csrf

            {{-- Quiz Info --}}
            <div class="mb-6">
                <input type="text" name="title" placeholder="Quiz title"
                    class="w-full border rounded-lg px-4 py-2 mb-3" required />
            </div>

            {{-- Questions --}}
            <template x-for="(question, qIndex) in questions" :key="qIndex">
                <div class="border rounded-xl p-5 mb-4 bg-white shadow-sm">

                    {{-- Question Header --}}
                    <div class="flex items-center justify-between mb-3">
                        <span class="font-semibold text-gray-700" x-text="'Question ' + (qIndex + 1)"></span>
                        <button type="button" @click="removeQuestion(qIndex)"
                            x-show="questions.length > 1"
                            class="text-red-500 text-sm hover:underline">
                            Remove
                        </button>
                    </div>

                    {{-- Hidden index input isn't needed — name uses x-bind --}}
                    <input type="text"
                        :name="'questions[' + qIndex + '][text]'"
                        x-model="question.text"
                        placeholder="Enter your question"
                        class="w-full border rounded-lg px-4 py-2 mb-4"
                        required />

                    {{-- Answers --}}
                    <template x-for="(answer, aIndex) in question.answers" :key="aIndex">
                        <div class="flex items-center gap-3 mb-2">

                            {{-- Mark as correct radio --}}
                            <input type="radio"
                                :name="'correct_' + qIndex"
                                :checked="answer.is_correct == 1"
                                @change="setCorrect(qIndex, aIndex)"
                                title="Mark as correct answer" />

                            <input type="text"
                                :name="'questions[' + qIndex + '][answers][' + aIndex + '][text]'"
                                x-model="answer.text"
                                placeholder="Answer option"
                                class="flex-1 border rounded-lg px-3 py-1.5"
                                required />

                            {{-- Hidden is_correct field --}}
                            <input type="hidden"
                                :name="'questions[' + qIndex + '][answers][' + aIndex + '][is_correct]'"
                                :value="answer.is_correct" />

                        </div>
                    </template>

                </div>
            </template>

            {{-- Add Question Button --}}
            <div class="flex items-center gap-4 my-4">
                <button type="button" @click="addQuestion"
                    :disabled="questions.length >= maxQuestions"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 disabled:opacity-40 disabled:cursor-not-allowed">
                    + Add Question
                </button>
                <span class="text-sm text-gray-500"
                    x-text="questions.length + ' / ' + maxQuestions + ' questions'">
                </span>
            </div>

            <button type="submit"
                class="w-full py-3 bg-green-600 text-white font-semibold rounded-xl hover:bg-green-700">
                Create Quiz
            </button>
        </form>
    </div>
</x-app-layout>