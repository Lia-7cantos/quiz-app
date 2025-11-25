<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;

class QuizSeeder extends Seeder
{
    public function run()
    {
        // Criar o quiz
        $quiz = Quiz::create([
            'title' => 'Quiz Marvel - Universo Cinematográfico',
            'description' => 'Teste seus conhecimentos sobre o UCM - 10 questões épicas!',
            'total_questions' => 10
        ]);

        $questions = [
            [
                'question_text' => 'Qual é o nome real do Homem de Ferro?',
                'options' => [
                    ['Tony Stark', true],
                    ['Steve Rogers', false],
                    ['Bruce Banner', false],
                    ['Peter Parker', false]
                ]
            ],
            [
                'question_text' => 'Qual joia do infinito está no Tesseract?',
                'options' => [
                    ['Joia do Espaço', true],
                    ['Joia do Tempo', false],
                    ['Joia da Mente', false],
                    ['Joia do Poder', false]
                ]
            ],
            [
                'question_text' => 'Qual personagem diz: "I can do this all day"?',
                'options' => [
                    ['Capitão América', true],
                    ['Homem de Ferro', false],
                    ['Thor', false],
                    ['Groot', false]
                ]
            ],
            [
                'question_text' => 'Qual é o planeta natal do Thor?',
                'options' => [
                    ['Asgard', true],
                    ['Vormir', false],
                    ['Titan', false],
                    ['Xandar', false]
                ]
            ],
            [
                'question_text' => 'Quem é o pai do Thanos?',
                'options' => [
                    ['A\'Lars', true],
                    ['Odin', false],
                    ['Ego', false],
                    ['J-Son', false]
                ]
            ],
            [
                'question_text' => 'Qual é o verdadeiro nome do Pantera Negra?',
                'options' => [
                    ['T\'Challa', true],
                    ['M\'Baku', false],
                    ['N\'Jadaka', false],
                    ['Zuri', false]
                ]
            ],
            [
                'question_text' => 'Qual arma a Viúva Negra prefere usar?',
                'options' => [
                    ['Armas de choque', true],
                    ['Martelo', false],
                    ['Escudo', false],
                    ['Arco e flecha', false]
                ]
            ],
            [
                'question_text' => 'Qual personagem é conhecido como "Deus do Trovão"?',
                'options' => [
                    ['Thor', true],
                    ['Loki', false],
                    ['Odin', false],
                    ['Heimdall', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome do irmão adotivo do Thor?',
                'options' => [
                    ['Loki', true],
                    ['Balder', false],
                    ['Tyr', false],
                    ['Hoder', false]
                ]
            ],
            [
                'question_text' => 'Quem criou o Visão?',
                'options' => [
                    ['Ultron e Tony Stark', true],
                    ['Bruce Banner sozinho', false],
                    ['Shuri', false],
                    ['Hank Pym', false]
                ]
            ],
            [
                'question_text' => 'Qual é o metal que compõe o escudo do Capitão América?',
                'options' => [
                    ['Vibranium', true],
                    ['Adamantium', false],
                    ['Carbonadium', false],
                    ['Uru', false]
                ]
            ],
            [
                'question_text' => 'Qual vilão é o principal antagonista em "Homem-Aranha: Longe de Casa"?',
                'options' => [
                    ['Mysterio', true],
                    ['Duende Verde', false],
                    ['Venom', false],
                    ['Carnificina', false]
                ]
            ],
            [
                'question_text' => 'Qual ator interpreta o Doutor Estranho?',
                'options' => [
                    ['Benedict Cumberbatch', true],
                    ['Robert Downey Jr.', false],
                    ['Chris Evans', false],
                    ['Mark Ruffalo', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome do reino dos deuses nórdicos na Marvel?',
                'options' => [
                    ['Asgard', true],
                    ['Midgard', false],
                    ['Jotunheim', false],
                    ['Vanaheim', false]
                ]
            ],
            [
                'question_text' => 'Quem é o guardião do Tesseract no início de "Os Vingadores"?',
                'options' => [
                    ['SHIELD', true],
                    ['HYDRA', false],
                    ['Kree', false],
                    ['Skrulls', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome da inteligência artificial do Homem de Ferro?',
                'options' => [
                    ['J.A.R.V.I.S.', true],
                    ['F.R.I.D.A.Y.', false],
                    ['U.L.T.R.O.N.', false],
                    ['V.I.S.I.O.N.', false]
                ]
            ],
            [
                'question_text' => 'Qual personagem é conhecido como "Mercúrio" nos cinemas?',
                'options' => [
                    ['Pietro Maximoff', true],
                    ['Peter Parker', false],
                    ['Peter Quill', false],
                    ['Phil Coulson', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome do martelo do Thor?',
                'options' => [
                    ['Mjolnir', true],
                    ['Stormbreaker', false],
                    ['Gungnir', false],
                    ['Hofund', false]
                ]
            ],
            [
                'question_text' => 'Quem é o líder dos Guardiões da Galáxia?',
                'options' => [
                    ['Senhor das Estrelas', true],
                    ['Rocket Raccoon', false],
                    ['Gamora', false],
                    ['Drax', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome real do Capitão América?',
                'options' => [
                    ['Steve Rogers', true],
                    ['Bucky Barnes', false],
                    ['Sam Wilson', false],
                    ['Clint Barton', false]
                ]
            ],
            [
                'question_text' => 'Qual personagem é dublado por Vin Diesel?',
                'options' => [
                    ['Groot', true],
                    ['Rocket', false],
                    ['Drax', false],
                    ['Thanos', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome da irmã do Pantera Negra?',
                'options' => [
                    ['Shuri', true],
                    ['Nakia', false],
                    ['Okoye', false],
                    ['Ramonda', false]
                ]
            ],
            [
                'question_text' => 'Qual vilão é o principal antagonista em "Pantera Negra"?',
                'options' => [
                    ['Erik Killmonger', true],
                    ['Ulysses Klaue', false],
                    ['M\'Baku', false],
                    ['Zemo', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome do planeta natal do Thanos?',
                'options' => [
                    ['Titan', true],
                    ['Sakaar', false],
                    ['Knowhere', false],
                    ['Morag', false]
                ]
            ],
            [
                'question_text' => 'Quem sacrificou a Joia da Alma em Vormir?',
                'options' => [
                    ['Gamora', true],
                    ['Natasha Romanoff', false],
                    ['Clint Barton', false],
                    ['Vision', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome do amigo de infância do Capitão América?',
                'options' => [
                    ['Bucky Barnes', true],
                    ['Sam Wilson', false],
                    ['Tony Stark', false],
                    ['Bruce Banner', false]
                ]
            ],
            [
                'question_text' => 'Qual personagem é conhecido como "Feiticeira Escarlate"?',
                'options' => [
                    ['Wanda Maximoff', true],
                    ['Gamora', false],
                    ['Nebulosa', false],
                    ['Valkyria', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome do vilão em "Homem-Formiga"?',
                'options' => [
                    ['Yellowjacket', true],
                    ['Red Skull', false],
                    ['Abomination', false],
                    ['Whiplash', false]
                ]
            ],
            [
                'question_text' => 'Quem dirige "Guardiões da Galáxia"?',
                'options' => [
                    ['James Gunn', true],
                    ['Joss Whedon', false],
                    ['Russo Brothers', false],
                    ['Taika Waititi', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome do cachorro do Homem de Ferro?',
                'options' => [
                    ['Não tem cachorro', true],
                    ['Lucky', false],
                    ['Max', false],
                    ['Thor', false]
                ]
            ],
            [
                'question_text' => 'Qual personagem usa um traje capaz de mudar de tamanho?',
                'options' => [
                    ['Homem-Formiga', true],
                    ['Homem-Aranha', false],
                    ['Pantera Negra', false],
                    ['Máquina de Combate', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome real do Homem-Aranha no UCM?',
                'options' => [
                    ['Peter Parker', true],
                    ['Miles Morales', false],
                    ['Gwen Stacy', false],
                    ['Ben Parker', false]
                ]
            ],
            [
                'question_text' => 'Quem interpreta o Gavião Arqueiro?',
                'options' => [
                    ['Jeremy Renner', true],
                    ['Chris Evans', false],
                    ['Chris Hemsworth', false],
                    ['Mark Ruffalo', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome da organização terrorista em Capitão América?',
                'options' => [
                    ['HYDRA', true],
                    ['A.I.M.', false],
                    ['Ten Rings', false],
                    ['The Hand', false]
                ]
            ],
            [
                'question_text' => 'Qual personagem tem um braço mecânico?',
                'options' => [
                    ['Bucky Barnes', true],
                    ['Tony Stark', false],
                    ['Rhodey', false],
                    ['Drax', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome da namorada do Senhor das Estrelas?',
                'options' => [
                    ['Gamora', true],
                    ['Nebulosa', false],
                    ['Mantis', false],
                    ['Valkyria', false]
                ]
            ],
            [
                'question_text' => 'Quem é o criador do Homem-Aranha nos quadrinhos?',
                'options' => [
                    ['Stan Lee', true],
                    ['Jack Kirby', false],
                    ['Steve Ditko', false],
                    ['John Romita', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome da capital de Wakanda?',
                'options' => [
                    ['Birnin Zana', true],
                    ['Golden City', false],
                    ['Jabari Land', false],
                    ['River Tribe', false]
                ]
            ],
            [
                'question_text' => 'Qual personagem é conhecido como "Deus da Mentira"?',
                'options' => [
                    ['Loki', true],
                    ['Thor', false],
                    ['Odin', false],
                    ['Heimdall', false]
                ]
            ],
            [
                'question_text' => 'Qual atriz interpreta a Capitã Marvel?',
                'options' => [
                    ['Brie Larson', true],
                    ['Scarlett Johansson', false],
                    ['Elizabeth Olsen', false],
                    ['Zoe Saldana', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome do pai do Thor?',
                'options' => [
                    ['Odin', true],
                    ['Laufey', false],
                    ['Bor', false],
                    ['Frigga', false]
                ]
            ],
            [
                'question_text' => 'Qual personagem é um androide criado por Ultron?',
                'options' => [
                    ['Visão', true],
                    ['J.A.R.V.I.S.', false],
                    ['F.R.I.D.A.Y.', false],
                    ['Ultron', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome do reino dos gigantes de gelo?',
                'options' => [
                    ['Jotunheim', true],
                    ['Muspelheim', false],
                    ['Niflheim', false],
                    ['Helheim', false]
                ]
            ],
            [
                'question_text' => 'Quem é o primeiro vilão do Homem de Ferro?',
                'options' => [
                    ['Obadiah Stane', true],
                    ['Whiplash', false],
                    ['Mandarin', false],
                    ['Justin Hammer', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome da arma que substitui o Mjolnir?',
                'options' => [
                    ['Stormbreaker', true],
                    ['Gungnir', false],
                    ['Hofund', false],
                    ['Jarnbjorn', false]
                ]
            ],
            [
                'question_text' => 'Qual personagem é conhecido como "Soldado Invernal"?',
                'options' => [
                    ['Bucky Barnes', true],
                    ['Steve Rogers', false],
                    ['Sam Wilson', false],
                    ['Brock Rumlow', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome do amigo de Thor na Terra?',
                'options' => [
                    ['Dr. Erik Selvig', true],
                    ['Jane Foster', false],
                    ['Darcy Lewis', false],
                    ['Ian Boothby', false]
                ]
            ],
            [
                'question_text' => 'Qual vilão é derrotado em "Doutor Estranho"?',
                'options' => [
                    ['Dormammu', true],
                    ['Kaecilius', false],
                    ['Mordo', false],
                    ['Ancient One', false]
                ]
            ],
            [
                'question_text' => 'Qual é o nome da joia que controla a mente?',
                'options' => [
                    ['Joia da Mente', true],
                    ['Joia do Tempo', false],
                    ['Joia do Espaço', false],
                    ['Joia do Poder', false]
                ]
            ],
            [
                'question_text' => 'Quem é o diretor de "Thor: Ragnarok"?',
                'options' => [
                    ['Taika Waititi', true],
                    ['James Gunn', false],
                    ['Jon Favreau', false],
                    ['Joss Whedon', false]
                ]
            ]
        ];

        // Inserir todas as 50 questões no banco
        foreach ($questions as $questionData) {
            $question = Question::create([
                'quiz_id' => $quiz->id,
                'question_text' => $questionData['question_text']
            ]);

            // Inserir as 4 opções para cada questão
            foreach ($questionData['options'] as $optionData) {
                Option::create([
                    'question_id' => $question->id,
                    'option_text' => $optionData[0],
                    'is_correct' => $optionData[1]
                ]);
            }
        }

        $this->command->info('50 questões da Marvel criadas com sucesso!');
    }
}
