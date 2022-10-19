@extends('layouts.app')

<script src="{{asset('js/familytree.js')}}"></script>
<div class="container">
    <div class="tree__inner" style="margin-top: 100px !important;">
        <div class="tree__nav">
            <div class="tree-nav__items">
                <div class="tree-nav__item">
                    <a class="tree-nav__link active" href="{{route('tree')}}">Семейное древо</a>
                </div>
                <div class="tree-nav__item">
                    <a class="tree-nav__link" href="{{route('tree.list')}}">Список профилей</a>
                </div>
            </div>
        </div>
        <div class="tree__controls">
            <a class="tree-controls__button -new btn btn-primary btn-sm" href="{{route('profile.create')}}">+ Добавить
                профиль</a>

        </div>
    </div>
    <div class="container-tree">
        <div id="tree">

        </div>
    </div>

</div>


<script>
    window.onload = function () {
        {{--let profiles = {!! json_encode($profiles->toArray())!!};--}}

        var family = new FamilyTree(document.getElementById("tree"), {
            template: 'john',

            nodeMouseClick: FamilyTree.action.details,
            siblingSeparation: 150,
            enableSearch: false,
            nodeBinding: {
                img_0: "img",
                field_0: 'name',
                field_1: "date",
            },
            {{--nodeMenu: {--}}
                {{--    addMore: {--}}
                {{--        text: "Редактировать",--}}
                {{--        onClick:function(){window.location.href = "{{URL::to('profile/create')}}"}--}}
                {{--    },--}}
                {{--},--}}

            editForm: {
                titleBinding: false,
                photoBinding: "img",
                edit: false,
                generateElementsFromFields: false,
                addMore: false,
                cancelBtn: 'Закрыть',

                saveAndCloseBtn: 'Редактировать',
                elements: [
                    {type: 'textbox', label: 'Полное имя', id: 'name', binding: 'fullname'},
                    [
                        {type: 'textbox', label: 'Дата рождения', binding: 'birthDate'},
                        {type: 'textbox', label: 'Дата смерти', binding: 'deathDate'}
                    ],
                    [
                        {type: 'textbox', label: 'Место рождения', binding: 'placebirth'},
                        {type: 'textbox', label: 'Место смерти', binding: 'burialplace'},
                    ],
                    {type: 'textbox', label: 'Причина смерти', binding: 'reasondeath'},
                    // {type: 'textbox', label: 'Photo Url', }


                ],
                buttons: {
                    edit: {
                        icon: FamilyTree.icon.edit(24, 24, '#fff'),
                        text: 'Edit',
                        hideIfEditMode: true,
                        hideIfDetailsMode: false
                    },
                    remove: null,
                    share: null,
                    pdf: null
                }
            }

        });
        // family.on('field', function (sender, args) {
        //     var name = args.data["name"];
        //     var date = args.data["date"];
        //     var link = args.data["link"];
        //     args.value = '<a target="_blank" href="' + link + '">' + name + ' ' + date+'</a>';
        // });

        let profiles = @json($profiles);

        profiles.forEach(function (profile) {
            family.addNode({
                id: profile.id,
                pids: [profile.p_id],
                mid: profile.m_id,
                fid: profile.f_id,
                name: [profile.first_name + ' ' + profile.last_name],
                fullname: [profile.first_name + ' ' + profile.patronymic + ' ' + profile.last_name],
                img: 'storage/' + profile.avatar,
                gender: 'male',
                birthDate: new Date(profile.date_birth).toLocaleDateString(),
                deathDate: new Date(profile.date_death).toLocaleDateString(),
                placebirth: profile.birth_place,
                burialplace: profile.burial_place,
                reasondeath: profile.reason_death,
                date: profile.date_birth + ' - ' + profile.date_death + ' ' + 'г.',
                link: 'https://ya.ru/',
            },)
        });

        function callHandler(nodeId) {
            // var nodeData = family.get(nodeId);
            // var employeeName = nodeData["name"];
            window.location.href = "{{URL::to('profile/create')}}";
        }
    }
    {{--document.querySelector(".link-button").addEventListener("click", function() {--}}
    {{--    window.location.href = "{{URL::to('profile/create')}}"--}}
    {{--});--}}

</script>
