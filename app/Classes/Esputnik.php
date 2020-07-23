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

    public function value_lists($list_item, $user)
    {
        $round = ($user->round > 9) ? 2 : 1;

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

        $new_values1 = [
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

        $new_values2 = [
            'В этот день Вам благоприятно начинать новые проекты, новые задачи. Вопрос любой сложности Вам будет по плечу. Разговор с шефом, переговоры с партнёрами или клиентами, любые важные переговоры пройдут благоприятно. В этот день любые сложные вопросы Вы можете решить силой своей энергетики гораздо проще, чем в другой день. Обычно, в этот день очень хорошие продажи, если Ваша работа с ними связана. Кстати, для продавца будет очень полезно в этот день обзвонить всю свою клиентскую базу, ну или написать всем, можно в итоге получить сделку мечты. В целом, всё, что Вы будете делать, в этот день будет продвигаться положительно. Зачастую мы говорим себе: "Вот бы в моей жизни появилось что-то новое, положительное". Так вот будьте внимательны, это как раз тот день, когда такое новое приходит в нашу жизнь, не пропустите. Это прекрасный день для того, чтобы генеировать новые идеи, начинать что-то новое, впоследствии это принесёт отличные плоды. Будьте энергичны в этот день и это будет обязательно вознаграждено планетами, либо в этот же день, либо впослдствии, но обязательно будет.',
            'В нашей жизни случаются дни, когда самое лучшее - это позволить себе немного расслабиться и ощутить как течение жизни несёт нас. Это тот самый день. В этот день проявлять свою энергичность и самоуверенность будет большой ошибкой. Наоборот, необходимо помнить сегоднчя, что каждый встретившийся нам в жизни человек - это наш Учитель, у которого нам есть чему научиться: ребёнок, старец, мужчина, женщина, не играет никакой роли, каждый нам дан с определённой целью. А раз этого Учителя нам послала Вселенная, значит мы должны проявить по отношению к Нему максимальное почтение. Принимайте решения максимально выверенно и не торопясь. А лучше вообще отложите принятие решения на завтра, если это возможно. Двигайтесь путём начатым вчера и не начинайте нового сегодня, если это не было запланированно вчера. Женщины, в Вашей жизни будут иметь наибольшее значение именно сегодня и если у Вас сложности в отношениях с кем-то из женщин, находящихся в Вашем круге общенияя, будет очень благоприятно именно в этот день приложить усилия для гармонизации отношений с ней или ими, да и вообще в целом со всеми кто Вас окружает. При этом другие в этот день будут стремиться оказать Вам физическую и моральную помощь и поддержку. Имеет смысл не делать покупок в такой день. В этот день лучше славу героя не зарабатывать, а предоставить это окружающим. Помните, спешка, надежда на логику - это не является энергиями этого дня. А вот положиться на интуицию, почувствовать, что подсказывает Вам сердце, именно сегодня благоприятно.',
            'В этот день у Вас будет получаться абсолютно всё. Вы будете наполнены энергией до краёв. Любая деятельность будет балгоприятной и успешной. Переговоры, встречи, совещания, везде вы сможете проявлять свои самые лучшие черты и умения. Люди будут соглашаться с Вами во всём, потому что Ваш магнетизм в этот день будет очень сильно воздействовать на всех, с кем Вы будете контактировать. Если Вы очень долго не могли принять решение по какому-то вопросу, помните, вероятность того, что принятое сегодня решение будет очень разумным и правильным очень велика. Любые знакомства этго дня будут полезны и благоприятны. При этом обращайте внимание и на важные уроки, которые в этот день посылает Вам Вселенная, они будут очень полезны Вам в будущем. В целом этот день можно охарактеризовать так: всё будет получвться, все вопросы будут решаться, а Ваша самооценка расти.',
            'Представьте сбе день, в который все Ваши начнинания заканчиваются успешно. День, когда Ваш мозг со небывалой скоростью выдаёт верное решение любой задачи. День, когда у Вас неимоверно огромное количество сил. Сегодня именно такой день. В этот день нужно поработать, как говорится, на полную не давая себе ни секунды отдыха. Всё, что Вы долго откладывали, можно и нужно делать именно сегодня. Меньше трат и больше доходов - финансовый девиз этого дня силы. Проснитесь раньше, не теряйте ни минуты этого мощного дня для решения любых задач, ни минуты на развлечения. Вы ещё читаете это письмо? Скорее вперед!',
            'Сегодня день неожиданных изменений и перемен: встречи могут быть отменены или перенесены, Вас могут подвести другие люди, да и у Вас обстоятельства могут сложиться так, что Вы кого-то можете подвести или перенести встречу. Не нужно расстраиваться, сетовать или нервничать, это нормально для этого дня, такая сегодня энергетика. Раз так получилось, просто переходите к другой задаче и занимайтесь ей.
Этот день может подталкивать к необдуманным поступкам, поэтому рекомендуется быть аккуратными и осмотрительными.
Помните, даже если Вы что-то потеряете в этот день, не стоит сожалеть, велика вероятность, что вместо потерянного появится что-то новое.
Зачастую, в этот день происходит множество переговоров, будьте внимательны, говорите вдумчиво, по делу, не ведите пустых бесед, Ваши слова могут повлиять на Вашу репутацию. При этом, разумно отстаивать свою точку зрения даже приветствуется, острота ума Вам обеспечана сегодня.
Сегодня очень желательно избегать конфликтных ситуаций и уж точно ни в коем случае не провоцировать их. А желание такое может быть. Но это Вселенная посылает Вам проверку на лояльность и дружелюбие, пройдите её разумно.
Это отличный день для поездок, как по работе, так и для отдыха. А ещё благоприятно сегодня навестить старых друзей.
Очень благоприятент день сегодня для всех, кто связан с любыми видами искусства, писательства.
Ну и просто позвольте сегодня себе немного развлечений.',
            'Вот и наступил день, который можно посвятить себе. Вложите этот день в себя, в своэ здоровье, в красоту.
Очень благоприятно в этот день улушать отношений. Если у Вас с кем-то были конфликты, Вам рекомендуется сегодня приложить усиля для их разрешения.
Сегодня имеет смысл вложить время в своё обучени и развитие, а также уделить внимание своему любимому занятию, в том случае, если оно связано с развитием личности. Это будет очень благоприятно и принесёт много качественных результатов.
При этом важно помнить, что если Ваше увлечение не в сфере развития личности или образования, то результатов может и не быть.
Очень хорошо в этот день уделить своей семье, сделать по дому дела, которые давно запланированы, но так и не были сделаны. Также в этот день принимать гостей или ходить в гости.
Очень благоприятно принимать решение по каким-то предложениям. А также, это хороший день для покупок, особенно украшений, предметов роскоши.
Рекомендуется заниматься домом и близкими людьми, ппровести вечер в романтической обстановке.
Очень важный момент, Ваша интуиция особенно обострена именно сегодня. Прислушивайтесь к ней.',
            'Это день покоя и умиротворения, день приёма гостей, день духовного развития. В этот день более благоприятно заниматься собой, своим развитием, трансформацией сознания. Очень важно в этот день быть в покое и равновесии, не предпринимая активных действий.  Это прекрасный день для отдыха. Очень благоприятно заняться каким-то творчеством в этот день, изучением какого-то знания, анализировать прошлое, мечтать о будущем, генерировать идеи, но не воплощать их сегодня.  Не стоит в этот день производить каких-то серьёзных операций с деньгами. Как всегда, когда чего-то нельзя, возникает сильное желание или необходимость это сделать, так и в это день Высшие силы могут посылвть испытания в виде срочной необходимости что-то решить или сделать. Помните, вероятнее всего, это именно провокация. Старайтесь соблюдать спокойствие, умиротворение и не спешите с действиями.Также очень хорошо сегодня посвятить время своему хобби, если оно не вредит любым другим живым существам. И пусть Весь Мир подождёт :-)',
            'Сегодняйший день нужно использовать на полную, потому, что это день Вашего успеха во всём материальном. Увеличение доходов, расширение финансовых потоков, вложения денег, различные финансовые операции, развитие своего дела - это всё энергии сегодняшнего дня. Если Вы сегодня проявите инициативу, она обязательно будет вознаграждена в будущем. Будете Вы действовать выверенно и продумано или будете рисковать в этот день, все варианты хороши для Вас сегодня.
Если работа или бизнес не приносят дохода или этот доход Вас совсем не удовлетворяет, сегодня хороший день для смены деятельности и начала новой деятельности, которая может расширить Ваши финансовые возможности в будущем.
А ещё в этот день хорошо думать о других и оказывать им помощь и поддержку.  В целом, это всегда полезно делать, но сегодня особенно. Энергии этого дня наделяют Ваши особенной силой и мудростью и Ваш совет сегодня может кому-то очень помочь в жизни.
Сегодня могут возникать ситуации, когда Ваше Эго и Гордыня взыграют и захотят себя проявить. Очень рекомендуется Вам именно в этот деть учитывать следуюущую мудрость:
Чем отличается Гордость от Гордыни. Свою Гордость человек может скрутиь в бараний рок, а Гордяня скрутит человека в бараний рог.
Не допускайте, чтобы Ваша Гордыня сделала это с Вами.
Ведь через такие ситуации сама Вселенная проверяет Вас и учит Вас перенастраивать свои мысли и себя на позитив. А тех, кто этого не поймёт и будет продавливать свои желания, могут ожидат неприятные сюрпризы от Вселенной.
Помните, сегодня одна из Ваших задач - забота о слабых. А тех, кто слабее Вас духом или телом вокруг каждого из нас достаточно.
',
            'Вот и наступил день подведения итогов. Именно сегодня лучше всего время уделить тому, чтобы навести порядки в своих мыслях и делах, подвести промежуночные итоги предыдущему активному периоду деятельности, избавиться от ненужных вещей и непродуктивных мыслей. Кстати, очень благоприятно не просто избавляться от старого сегодня, но и оказывать благотворительность. Подумайте, может пора что-то из своего гардероба отдать нуждающимся. А вот приобретать новое сегодня не рекомендуется.
Если твёрдо следовать намеченным на сегодня планам, что очень рекомендуется сегодня, есть большие шансы на получение хорошей поддержки своим планам и реализациям, которая может появиться уже сегодня, поспособствовать Вашим идеям и проектам в ближайшем будущем.
Если на этот день запланированы поездки, то помните, что энергии этого дня всячески этому способствуют. Даже в случае, если поездка не была запланирована, но вдруг возникла такая необходимость, смело решайтесь на неё.
Этот день очень хорош для раскрытия своего творческого потенциала. При этом творчество у каждого может быть своё: кто-то резкой по дереву занимается, кто-то картины рисует, кто-то книгу пишет, а кто-то генерирует идеи по работе или бизнесу, как ни крути, а это тоже один из видов творчества. Как художник создаёт только ему ведомый мир и переносит его из своего сознания на полотно, так и бизнесмен своё видение будущего мира переносит из своего сознания в жизнь и создаёт новые сервисы, которые впоследствии становятся доступны многим. Позвольте сегодня высвободиться этой творческой энергии, в каком бы образе она не вырывалась из Вас наружу.
Если Вы сегодня участвуете в каких-то соревнованиях, отборах, у Вас есть большие шансы на победу.
В этот день благоприятно проводить операции, особенно, если это будет вторник.
И помните, именно сегодня кому-то в Вашем окружении может понадобиться помощи и защита. И Вы - именно тот чловек, кто должен её оказать. Также нужно помнить, что иногда мы должны защищать других, в первую очередь, от себя.
'
        ];

        /*
        if($user->id == 40) {
            if ($round == 1) {
                return $new_values1[$list_item-1];
            } else {
                return $new_values2[$list_item-1];
            }
        } else {
            return $values[$list_item-1];
        }*/

        if ($round == 1) {
            return $new_values1[$list_item-1];
        } else {
            return $new_values2[$list_item-1];
        }
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

    public function createUserInES($user, $group_name = 'Трёхдневные')
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
        $request_entity->groupNames = array($group_name);

        $this->sendRequestES($url, $request_entity);
    }
}
