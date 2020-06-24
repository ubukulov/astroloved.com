<?php

namespace App\Classes;

use Carbon\Carbon;
use stdClass;

class Esputnik
{
    protected $username = 'astroloved777@gmail.com';
    protected $password = 'Fdhg52kdj';

    public function getPDCNumber($birth_date)
    {
        $b_d = recursive(date('d', $birth_date));
        $b_m = recursive(date('m', $birth_date));

        $t_d = recursive(date('d'));
        $t_m = recursive(date('m'));
        $t_y = 4;

        $new_n = $b_d + $b_m + $t_d + $t_m + $t_y;

        return recursive($new_n);
    }

    public function value_lists($list_item)
    {
        $values = [
            'Отличный день для Вас для решения серьёзных задач и новых начинаний, заключение сделок, проведение переговоров. Для Вас это отличный день для какой-то большой задачи, осуществления чего-то задуманного, можно провести переговоры с важными для Вас людьми. Если Вы занимаетесь продажами, то это отличный день для работы с клиентской базой, это может принести хорошие сделки. В этот день у Вас могут проявиться творческие силы, могут осенять новые идеи, можно получить новые навыки. В этот день перед Вами могут открыться новые горизонты, будьте внимательны. В этот день Ваша инициатива будет по достоинству оценена. В этот день Вы можете ожидать улучшение в целом всех дел.',
            'Прекрасный день для того, чтобы Вы проявили свою гибкость, дипломатию, это будет оценено. Вам рекомендуется быть максимально тактичным, учтивым, воздержаться от покупок, не спешить ни с принятием решений, ни с действиями. Рекомендуется сбавить темп и дать возможность другим проявить себя. Не позволяйте в этот день себя подталкивать и торопить, иначе могут быть очень неверные решения и поступки. В этот день Вам хорошо урегулировать отношений, особенно с женщинами. Даже если Вы сама женщина. Продолжайте то, что было начато в вчера. Ваша интуиция в этот день особенно сильна. Поэтому поменьше размышляйте в этот день и больше прислушивайтесь к своему сердцу. Для Вас хорошо решать вопросы, связанные с отношениями в этот день. Также будет благоприятным обращаться за помощью или просьбами в этот день, но только если это не касается финансов.',
            'В этот день Вы можете сверкать звездой, конечно, если выйдете из дома. Ваш личный магнетизм, обаяние, шарм, воодушевление – это и есть энергия этого дня силы. День благоприятен для Вашей кипучей деятельности. Очень благоприятно для Вас в этот день делать серьёзный выбор, вибрация этого дня наделяет Вас способностью верного выбора. Даже в незначительных вещах, например, приобрести какую-то вещь. Вам рекомендуется в этот день выражать свои чувства, люди поймут и могут ответить взаимностью. Ваш позитивный настрой в этот день поможет преодолеть всё: на работе, дома, в обществе, везде делайте ставку на самовыражение и Вы будете в выигрыше. Это отличный день чтобы завести новые полезные в будущем знакомства, познакомиться со своими учителями, заниматься интеллектуальным трудом, учиться чему-либо, повышать свою квалификацию, сдавать экзамены. Также Вы можете получить важный жизненный урок в этот день.',
            'В этот день Вам нужно попахать. При этом у Вас появятся силы, мотивы, возможности сделать всё то, что обычно откладывается в жизни. В этот день рекомендуется браться за любое дело независимо от его масштаба: подписание контрактов, заключение сделок, договоров, начинать масштабные дела, иметь любые дела с недвижимостью – это как раз и есть этот день силы. В этот день Ваш интеллект становится особенно сильным. Всё что требуется, Вы можете решить в этот день. Опрометчиво будет упустить такой день. Всё что связано со здоровьем и медициной тоже полезно Вам решать в этот день. Сократите в этот день статьи расходов и добавьте что-то в статью доходов. Для Вас это хороший день, чтобы потрудиться и браться вообще за всё. Вам будет полезно в этот день встать пораньше, чтобы было больше энергии на этот день. В этот день Вам нужно забыть про развлечения и трудиться до победного конца, т.к. именно сегодня всё может окупиться, все вложения сил и средств. Поэтому Вам рекомендуется трудиться до упора в этот день, но придерживаясь распорядка дня.',
            'Если назначенная на сегодня встреча будет отменена, не удивляйтесь и не расстраивайтесь. Все поэтому перемены сегодняшнего дня, Вам нужно воспринимать как должное, если что-то пойдёт не так в этот день – это нормально. Просто нужно Вам переключиться на что-то другое и не заморачиваться. В этот Вам рекомендуется помнить, если что-то потеряете, очень велика вероятность найти что-то лучшее. Если какой-то человек Вас подвёл в этот день, не вините этого человека, это Ваша энергетика сегодняшнего дня привела к таким обстоятельствам. Под влиянием вибраций этого дня Вы тоже можете что-то отменить, или изменить, или даже кого-то подвести, т.к. у Вас может возникнуть какое-то новое неотложное дело. Девиз этого дня: непривязанность и разнообразие. Но нужно быть аккуратными, этот день может подталкивать и провоцировать на то, чтобы ввязаться в какую-то авантюру, на совершение необдуманных действий. На кону может быть Ваша карьера и репутация. Именно сегодня нужно быть предельно осмотрительным. Обычно в этот день много разговоров, переговоров, споров и ссор и всё это нормально. Главное, Вы сами не провоцируйте эти споры и ссоры. Любая деятельность, связанная со СМИ и с любыми видами искусства в этот день для Вас благоприятны. Изложение в тексте своих мыслей может принести свои плоды. Люди слова, поэты, спикеры, литераторы, в этот день пишут шедевры. Вам важно в этот день не вести пустых разговоров, воздерживаться от споров, не провоцировать их. Можно легко заиграться. Как уже говорилось выше, на кону может быть Ваша репутация и карьера. Наряду с этим, в этот день самое лучшее время Вам позволить себе маленькие развлечения. Это отличный день для передвижений, поездок, путешествий. Защищать, отстаивать свою точку зрения, показать остроту своего ума, всё хорошо для Вас, но в меру. Напомните о себе старым знакомым, освежите имеющиеся связи.',
            'В этот день лучше всего заняться собой: посетить салонов красоты, фитнеса, СПА. Это Ваш день умиротворения, а ещё лучше уделить время дому и семье, пригласить гостей или посещетить друзей, родственников. Если у Вас были ссоры с кем-то, то этот день поможет укрепить отношения. В этот день очень сильна энергия образования, поэтому для Вас это очень хороший день для любого начала: обучения: курсы, мастер-классы, лекции, тренинги и т.д. Очень хорошо для внутренней гармонии посвятить время своему хобби, и если оно посвящено саморазвитию, это принесёт хорошие плоды. Если хобби не связано с саморазвитием, то такое хобби не имеет отношение к этому дню. Если Вы собирались сделать предложение или принять его, то в этот день Вам очень благоприятно это делать. Это хороший день для приобретения предметов роскоши, украшений. Создание уютной атмосферы дома и повышение комфорта дома в этот день, организоация романтического вечера с любимыми людьми тоже очень благоприятны. В этот день преобладают энергии гармонии и красоты. Вам очень благоприятно заниматься семьёй, уделять время родным, близким, проявлять заботу о них. Вам необходимо прислушиваться к интуиции, т.к. она особенно сильна в этот день. Можно начать развивать её.',
            'Это единственный персональный день силы в цикле, когда Вам особенно важно сохранять равновесие и быть в покое, а лучше вообще, по возможности, оставаться в одиночестве. Отличный день для того, чтобы побыть в уединении, подумать о жизни, посвятить его духовному развитию. Именно этот день благоприятствует более всего духовному развитию и трансформации сознания. В этот день Вам особенно благоприятно заниматься йогой или начать ей заниматься, посвятить себя медитативной практике, молитвенным практикам. Этот день не самое лучшее время для активных действий, а вот для отдыха это отличный день. Сегодня Вам лучше тщательно обдумывать завтрашний шаг и все остальные шаги, прежде чем что-то делать. Энергетика этого дня сопряжена с духовностью, поэтому, если в этот день у Вас будет проявляться интерес к мистике, неведомым тайнам мироздания, это очень хорошо и естественно для этого дня. Также если сегодня у Вас будут какие-то творческие начинания или творческие реализации, то они в ближайшем будущем могут принести хорошие плоды. Сегодня время для анализа и интуиции, а не для глобальной деятельности. Поэтому Вам не нужно в этот день проявлять суету и активность. Это время для бездействия и размышлений. Поэтому Вам в этот день могут приходить гениальные идеи, открытия, реализации. Этот день особенно не благоприятствует тому, чтобы заниматься любыми финансовыми операциями. Хотя именно этот день как раз и может провоцировать Вас на это. Так Вас экзаменует Вселенная. Но поразмыслить об этом очень полезно в этот день, а вот делать лучше уже на следующий день. В этот день могут возникать разные провокации, это происходит специально для Вас, чтобы Вы проявили свою дипломатичность. Высказывать моральное превосходство в любой день неблагоприятно, а тем более в этот день. Именно в этот день можно легко нажить себе врагов. Поэтому Вам рекомендуется сократить общение в этот день до минимума. При этом, это отличный день, чтобы развивать в себе психические и мистические способности.',
            'Этот день очень благоприятен для вложения капитала и всевозможных финансовых операций с целью развития своего дела. Вам рекомендуется не терять ни минуты. Это день материального успеха. Он очень удачен в финансовом отношении. Сегодня Вам нужно проявлять инициативу, в этом случае Вы можете получить хорошие плоды. Вы можете сменить направление деятельности в этот день, если текущая деятельность не приносит доходов или если хотите расширить финансовые потоки. Это хороший день для благотворительности, не только материальной, а даже просто для доброго совета или вложения своего личного времени в благотворительность. Совет, данный Вами в этот день, может помочь кому-то выбраться из затруднительного положения. Сегодня Вы смело можете проявлять свою интуицию. Рискуйте. Обязательно уделите внимание дорогим Вам людям, особенно старшим, особенно родителям, особенно к слабым. Сегодня могут быть серьёзные провокации на конфликты. Помните, это не кто-то провоцирует вас, это Ваш личный диалог с Высшими силами. Вас проверяет Вселенная, чтобы дать Вам возможность трансформировать негатив в позитив. Поэтому в этот день будьте особенно внимательны к людям. Иначе Вы можете здорово навредить себе. Это отличный день, чтобы преуспеть в судебных делах. Не означает выигрывать, но тем не менее, преуспеть.',
            'Этот день означает генеральную уборку: в сознании, в компьютере, в доме, в машине, в рабочем пространстве, где угодно. В этот день Вам рекомендуется навести порядок во всём, чтобы завтра Вас уже ничего не отвлекало, чтобы Вы подготовились к новому циклу, который начинается завтра. Рекомендуется не идти на компромиссы, если решение принято, нужно ему следовать. В этот день Вы можете получить хорошую поддержку, если не будете менять в этот день своих планов. Также в этот день возможны поездки, поэтому можно в неё смело отправляться, если вдруг таковая возникла или запланирована на этот день. В этот день может появиться человек, который может способствовать появлению хороших плодов в будущем. Если неожиданно потребуется куда-то поехать, езжайте не раздумывая. Также это время для раскрытия своего творческого потенциала, творческих реализаций. Дайте возможность высвободиться Вашей творческой энергии для гармонизации этого дня силы. Этот день под энергиями соперничества, соревнований, победы. У Вас есть все шансы победить. Хороший день, чтобы подвести итоги прошедшего периода, заниматься благотворительностью. Неблагоприятно отступать от намеченных ранее планов. Вам нужно отказаться от всего ненужного в этот день. Делать операции благоприятно, особенно если это вторник. Покупки не очень хороши, это день избавления от вещей, а не приобретения. Ну и нужно помнить о том, что если придётся кому-то покровительствовать, кого-то защищать, то Вселенная своими энергиями поможет Вам.'
        ];

        return $values[$list_item-1];
    }

    public function sendEmail($message_id, $data, $type_message = 1)
    {
        $url = 'https://esputnik.com/api/v1/message/'.$message_id.'/smartsend';

        $json_value = new stdClass();
        $first_name = $data['name'];

        switch ($type_message) {
            case 1:
                // письмо с подтверждением аккаунта
                $confirmation_link = $data['confirmation_link'];
                $json_value->recipients = [
                    [
                        'email' => $data['email'],
                        'jsonParam' => "{'confirmation_link': \"$confirmation_link\", 'firstname': $first_name}"
                    ]
                ];
                break;

            case 2:
                // Отправление ПДС - бесплатные подписчикам
                $pdc = $data['pdc'];
                $number = (isset($data['number'])) ? $data['number'] : '';
                $buy_subscription_link = $data['buy_subscription_link'];
                $buy_course_link = $data['buy_course_link'];
                $buy_consultation_link = $data['buy_consultation_link'];
                $json_value->recipients = [
                    [
                        'email' => $data['email'],
                        'jsonParam' => "{'pdc': \"$pdc\", 'firstname': $first_name, 'number': $number, 'buy_subscription_link': \"$buy_subscription_link\", 'buy_course_link': \"$buy_course_link\", 'buy_consultation_link': \"$buy_consultation_link\"}"
                    ]
                ];
                break;

            case 3:
                // Отправление ПДС - оплаченные подписчики
                $pdc = $data['pdc'];
                $buy_subscription_link = $data['buy_subscription_link'];
                $buy_course_link = $data['buy_course_link'];
                $buy_consultation_link = $data['buy_consultation_link'];
                $json_value->recipients = [
                    [
                        'email' => $data['email'],
                        'jsonParam' => "{'pdc': \"$pdc\", 'firstname': $first_name, 'buy_subscription_link': \"$buy_subscription_link\", 'buy_course_link': \"$buy_course_link\", 'buy_consultation_link': \"$buy_consultation_link\"}"
                    ]
                ];
                break;

            case 4:
                // новый пользователь оставил заявку на 15мин консультацию
                $phone = $data['phone'];
                $email = $data['email'];
                $json_value->recipients = [
                    [
                        'email' => $data['email'],
                        'jsonParam' => "{'phone': \"$phone\", 'firstname': $first_name, 'email': \"$email\"}"
                    ]
                ];
                break;
        }

        // В подготовленном сообщении можно использовать передаваемое значение "discount" для каждого контакта, обратившись к нему таким образом: $data.get('discount')
        // Есть возможность передавать массивы объектов и строить контент сообщения с использованием циклов confirmation_link

        $this->sendRequestES($url, $json_value);
    }

    public function sendRequestES($url, $json_values)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($json_values));
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_USERPWD, $this->username.':'.$this->password);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_SSLVERSION, 6);
        $output = curl_exec($ch);
        //echo($output);
        curl_close($ch);
    }

    public function createUserInES($user)
    {
        $first_name = $user->name;
        $email = $user->email;	// email контакта
        $url = 'https://esputnik.com/api/v1/contacts';

        $contact = new stdClass();
        $contact->firstName = $first_name;
        $contact->channels = array(
            array('type'=>'email', 'value' => $email)
        );

        $request_entity = new stdClass();
        $request_entity->contacts = array($contact);
        $request_entity->dedupeOn = 'email';
        $request_entity->contactFields = array('firstName', 'email');
        $request_entity->groupNames = array('Трёхдневные');

        $this->sendRequestES($url, $request_entity);
    }
}
