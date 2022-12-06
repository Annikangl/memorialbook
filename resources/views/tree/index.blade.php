@extends('layouts.app')

<script src="{{asset('js/familytree.js')}}"></script>
<div class="container">
    <div class="tree__inner" style="margin-top: 100px !important;">
        <div class="tree__nav">
            <div class="tree-nav__items">
                <div class="tree-nav__item">
                    <a class="tree-nav__link active" href="{{ route('tree') }}">Семейное древо</a>
                </div>
                <div class="tree-nav__item">
                    <a class="tree-nav__link" href="#">Список профилей</a>
                </div>
            </div>
        </div>
        <div class="tree__controls">
            <a class="tree-controls__button btn blue-btn" href="{{ route('profile.create') }}">+
                Добавить профиль
            </a>

        </div>
    </div>
    <div class="container-tree">
        <div id="tree">

        </div>
    </div>

</div>


<script>
    window.onload = function () {

        var family = new FamilyTree(document.getElementById("tree"), {
            template: 'john',

            nodeMouseClick: FamilyTree.action.none,
            siblingSeparation: 150,
            enableSearch: false,
            nodeBinding: {
                img_0: "img",
                field_0: 'name',
                field_1: "date",
            },
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

        family.on('click', function (sender, args,) {
            var link = args.node.gender;
            console.log(args)
            window.location.href = 'profile/card/' + link
        });

        let profiles = @json($profiles);

        profiles.forEach(function (profile) {
            family.addNode({
                id: profile.id,
                // slug:profile.slug,
                pids: [profile.spouse_id],
                mid: profile.mother_id,
                fid: profile.father_id,
                name: [profile.first_name + ' ' + profile.last_name],
                fullname: [profile.first_name + ' ' + profile.patronymic + ' ' + profile.last_name],
                img: 'storage/' + profile.avatar,
                gender: profile.slug,
                birthDate: new Date(profile.date_birth).toLocaleDateString(),
                deathDate: new Date(profile.date_death).toLocaleDateString(),
                placebirth: profile.birth_place,
                burialplace: profile.burial_place,
                reasondeath: profile.reason_death,
                date: new Date(profile.date_birth).getFullYear() + ' - ' + new Date(profile.date_death).getFullYear() + ' ' + 'г.',
                link: 'profile/update/' + profile.id,
            },)
        });
    }

</script>
