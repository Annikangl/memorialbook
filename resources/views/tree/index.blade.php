@extends('layouts.app')

@section('content')
<section class="family-tree">
        <div class="tree__inner">
            <div class="tree__nav">
                <div class="tree-nav__items">
                    <div class="tree-nav__item">
                        <a class="tree-nav__link active"
                           href="{{ route('tree') }}">{{__('family_tree.link_family_tree')}}</a>
                    </div>
                    <div class="tree-nav__item">
                        <a class="tree-nav__link" href="#">{{__('family_tree.link_profile_list')}}</a>
                    </div>
                </div>
            </div>
            <div class="tree__controls">
                <a class="tree-controls__button btn blue-btn" href="{{ route('profile.human.create') }}">+
                    {{ __('family_tree.btn_create_profile') }}
                </a>
            </div>
        </div>
        <div class="container-tree">
            <div id="tree">
            </div>
        </div>
</section>

@endsection

@section('scripts')
    <script src="{{ asset('js/familytree.js') }}"></script>


    <script>

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
            const link = args.node.gender;
            console.log(sender)
            // window.location.href = 'profile/card/' + link
        });

        let profiles = @json($humans);

        profiles.forEach(function (human) {
            family.addNode({
                id: human.id,
                slug:human.slug,
                pids: [human.spouse_id],
                mid: human.mother_id,
                fid: human.father_id,
                name: human.fullName,
                img: human.avatar,
                gender: human.gender,
                birthDate: new Date(human.date_birth).toLocaleDateString(),
                deathDate: new Date(human.date_death).toLocaleDateString(),
                date: new Date(human.date_birth).getFullYear() + ' - ' + new Date(human.date_death).getFullYear() + ' ' + 'г.',
                link: 'profile/update/' + human.id,
            },)
        });


    </script>

@endsection





