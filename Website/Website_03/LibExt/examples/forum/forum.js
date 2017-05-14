/*!
 * Ext JS Library 3.3.1
 * Copyright(c) 2006-2010 Sencha Inc.
 * licensing@sencha.com
 * http://www.sencha.com/license
 */
var Forum = {};

//////////////////////////////////////////////////////////////////////////////////////////////
// The data store for topics
Forum.TopicStore = function(){
    Forum.TopicStore.superclass.constructor.call(this, {
        remoteSort: true,

        //proxy: new Ext.data.ScriptTagProxy({
        proxy: new Ext.data.HttpProxy({
            //url: 'http://extjs.com/forum/topics-browse-remote.php'
            url: 'http://localhost/Dragon_03/FetchForum.php'
        }),

        reader: new Ext.data.JsonReader({
            root: 'topics',
            totalProperty: 'totalCount',
            id: 'threadid'
        }, [
            'title', 'forumtitle', 'forumid', 'author',
            {name: 'replycount', type: 'int'},
            {name: 'lastpost', mapping: 'lastpost', type: 'date', dateFormat: 'timestamp'},
            'lastposter', 'excerpt'
        ])
    });

    this.setDefaultSort('lastpost', 'desc');
};
Ext.extend(Forum.TopicStore, Ext.data.Store, {
    loadForum : function(forumId){
        this.baseParams = {
            forumId: forumId
        };
        this.load({
            params: {
                start:0,
                limit:25
            }
        });
    }
});

//////////////////////////////////////////////////////////////////////////////////////////////

// some renderers
Forum.Renderers = {
    topic : function(value, p, record){
        return String.format(
                '<div class="topic"><b>{0}</b><span class="author">{1}</span></div>',
                value, record.data.author, record.id, record.data.forumid);
    },

    lastPost : function(value, p, r){
				//alert("lastPost == ["+value+"]");
        return String.format('<span class="post-date">{0}</span><br/>by {1}', value.dateFormat('M j, Y, g:i a'), r.data['lastposter']);
    }
};

//////////////////////////////////////////////////////////////////////////////////////////////

Forum.SearchView = function(search){

    this.preview = new Ext.Panel({
        region:'south',
        height:250,
        title:'View Message',
        split:true
    });

    this.store = new Ext.data.Store({
        remoteSort: true,
        proxy: new Ext.data.ScriptTagProxy({
            //url: 'http://extjs.com/forum/topics-browse-remote.php'
            url: 'http://localhost/Dragon_03/FetchForum.php'
        }),
        reader: new Ext.data.JsonReader({
            root: 'topics',
            totalProperty: 'totalCount',
            id: 'post_id'
        }, [
            {name: 'postId', mapping: 'post_id'},
            {name: 'title', mapping: 'topic_title'},
            {name: 'topicId', mapping: 'topic_id'},
            {name: 'author', mapping: 'author'},
            {name: 'lastPost', mapping: 'post_time', type: 'date', dateFormat: 'timestamp'},
            {name: 'excerpt', mapping: 'post_text'}
        ])
    });
    this.store.setDefaultSort('lastpost', 'desc');


    this.grid = new Ext.grid.GridPanel({
        region:'center',

        store: this.store,

        cm: new Ext.grid.ColumnModel([{
           id: 'topic',
           header: "Post Title",
           dataIndex: 'title',
           width: 420,
           renderer: Forum.Renderers.topic
        },{
           id: 'last',
           header: "Date Posted",
           dataIndex: 'lastpost',
           width: 150,
           renderer: Ext.util.Format.dateRenderer('M j, Y, g:i a')
        }]),

        sm: new Ext.grid.RowSelectionModel({
            singleSelect:true
        }),

        trackMouseOver:false,

        loadMask: {msg:'Searching...'},

        viewConfig: {
            forceFit:true,
            enableRowBody:true,
            showPreview:true,
            getRowClass : function(record, rowIndex, p, ds){
                if(this.showPreview){
                    p.body = '<p>'+record.data.excerpt+'</p>';
                    return 'x-grid3-row-expanded';
                }
                return 'x-grid3-row-collapsed';
            }
        },

        bbar: new Ext.PagingToolbar({
            pageSize: 25,
            store: ds,
            displayInfo: true,
            displayMsg: 'Displaying results {0} - {1} of {2}',
            emptyMsg: "No results to display"
        })
    });

    Forum.SearchView.superclass.constructor.call(this, {
        layout:'border',
        title:'Search: '+Ext.util.Format.htmlEncode('"'+search+'"'),
        items:[ this.grid, this.preview ]
     });

    this.store.baseParams = {
        query: search
    };

    this.store.load({params:{start:0, limit: 25}});
};

Ext.extend(Forum.SearchView, Ext.Panel);



Ext.onReady(function(){

    Ext.QuickTips.init();

    var ds = new Forum.TopicStore();

    var cm = new Ext.grid.ColumnModel([{
           id: 'topic',
           header: "Topic",
           dataIndex: 'title',
           width: 420,
           renderer: Forum.Renderers.topic
        },{
           header: "Author",
           dataIndex: 'author',
           width: 100,
           hidden: true
        },{
           header: "Replies",
           dataIndex: 'replycount',
           width: 70,
           align: 'right'
        },{
           id: 'last',
           header: "Last Post",
           dataIndex: 'lastpost',
           width: 150,
           renderer: Forum.Renderers.lastPost
        }]);

    cm.defaultSortable = true;

		var sClickID="";

    var viewport = new Ext.Viewport({
        layout:'border',
        items:[
            new Ext.BoxComponent({ // raw
                region:'north',
                el: 'header',
                height:32
            }),
            new Ext.tree.TreePanel({
                id:'forum-tree',
                region:'west',
                title:'Forums',
                split:true,
                width: 325,
                minSize: 175,
                maxSize: 400,
                collapsible: true,
                margins:'0 0 5 5',
                loader: new Forum.TreeLoader(),
                rootVisible:false,
                lines:false,
                autoScroll:true,
                root: new Ext.tree.AsyncTreeNode({
                          text: 'Forums',
                          expanded:true
                      })
            }),
            new Ext.TabPanel({
                id:'main-tabs',
                activeTab:0,
                region:'center',
                margins:'0 5 5 0',
                resizeTabs:true,
                tabWidth:150,
                items: {
                    id:'main-view',
                    layout:'border',
                    title:'Loading...',
                    items:[
                        new Ext.grid.GridPanel({
                            region:'center',
                            id:'topic-grid',
                            store: ds,
                            cm: cm,
                            sm:new Ext.grid.RowSelectionModel({
                                singleSelect:true,
                                listeners: {
                                    selectionchange: function(sel){
                                        var rec = sel.getSelected();
                                        if(rec){
																						//alert("topic==" + rec.get('topic')) ;
																						//alert("title==" + rec.get('title')) ;
                                            Ext.getCmp('preview').body.update('<b><u>' + rec.get('title') + '</u></b><br /><br />Post details here.');
																						//####################### casper add 2011/5/21 #######################
																						//alert(rec.get('forumid'));
																						sClickID=rec.get('forumid');
																						//####################################################################
                                        }
                                    }
                                }
                            }),
                            trackMouseOver:false,
                            loadMask: {msg:'Loading Topics...'},
                            viewConfig: {
                                forceFit:true,
                                enableRowBody:true,
                                showPreview:true,
                                getRowClass : function(record, rowIndex, p, ds){
                                    if(this.showPreview){
                                        p.body = '<p>'+record.data.excerpt+'</p>';
                                        return 'x-grid3-row-expanded';
                                    }
                                    return 'x-grid3-row-collapsed';
                                }
                            },
                            tbar:[
                                {
                                    text:'New Topic',
                                    iconCls: 'new-topic',
                                    handler:function(){alert('Not implemented.');}
                                },
                                '-',
                                {
                                    pressed: true,
                                    enableToggle:true,
                                    text:'Preview Pane',
                                    tooltip: {title:'Preview Pane',text:'Show or hide the Preview Pane'},
                                    iconCls: 'preview',
                                    toggleHandler: togglePreview
                                },
                                ' ',
                                {
                                    pressed: true,
                                    enableToggle:true,
                                    text:'Summary',
                                    tooltip: {title:'Post Summary',text:'View a short summary of each post in the list'},
                                    iconCls: 'summary',
                                    toggleHandler: toggleDetails
                                }
                            ],
                            bbar: new Ext.PagingToolbar({
                                pageSize: 25,
                                store: ds,
                                displayInfo: true,
                                displayMsg: 'Displaying topics {0} - {1} of {2}',
                                emptyMsg: "No topics to display"
                            })
                        }), {
                            id:'preview',
                            region:'south',
                            height:250,
                            //title:'View Topic',
                            split:true,
                            bodyStyle: 'padding: 10px; font-family: Arial; font-size: 12px;',
														//################################ casper add 2011/5/13 ################################
                            tbar:[
                                {
                                    text:'Reply Topic',
                                    iconCls: 'new-topic',
                                    handler:function(){
																				var formPanel = new Ext.form.FormPanel({
																						labelWidth: 75, // label settings here cascade unless overridden
																						url:'index.php',
																						tag: 'winlogin',
																						frame:true,
																						bodyStyle:'padding:5px 5px 0',
																						defaults: {width: 230},
																						defaultType: 'textfield',
																						items: [{
																										fieldLabel: '輸入回覆',
																										xtype:'htmleditor',
																										name: 'mspm02',
																										height:200,
																										anchor:'98%',
																										allowBlank:true
																								},{
																										//msp01 塗鴨牆編號
																										name: 'msp01',
																										inputType: 'hidden',
																										value: '',
																										allowBlank:true
																								}
																						],
																						buttons: [{
																								text: '回覆',
																								handler: function(){
																								
																								//############################# casper add 2011/5/21 #############################
																								formPanel.getForm().setValues({
																										msp01:sClickID
																								});

																								//alert("mspm02 == [ "+formPanel.getForm().findField("mspm02").getValue()+"]");
																								//alert("msp01 == ["+formPanel.getForm().findField("msp01").getValue()+"]");
																								//return false;
																								//################################################################################

																						//******************* Added by Plover 2011/05/18  *******************//
																						formPanel.getForm().submit({
																								url:'../../../FRM0101/FRM0101.php', 
																								waitMsg:'資料寫入中...', 
																								success: function(form, action){
																										//form.responseText; //返回的结果
																										Ext.MessageBox.show({
																												title: '執行狀態',
																												msg: '資料已更新成功！',
																												buttons: Ext.MessageBox.OK,
																												icon: "ext-mb-info"
																										});
																										return false;
																								},
																								failure: function(form, action){
																										//Ext.Msg.alert('failure','err');
																										//form.responseText; //返回的结果
																										Ext.MessageBox.show({
																												title: '執行狀態',
																												msg: '資料更新失敗！',
																												buttons: Ext.MessageBox.OK,
																												icon: "ext-mb-error"
																										});
																										return false;
																								}
																						});
																						//****************************************************************//
																										win.hide();
																								}
																						},{
																								text: '取消',
																								handler: function(){
																										win.close();
																								}
																						}]
																				})

																				var win = new Ext.Window({   
																						title : '回覆文章',   
																						width : 400,
																						items:formPanel
																				});   
																				win.show(); 
																		}
                                }
                            ]
														//######################################################################################
                        }
                     ]
                 }
              })
         ]
    });

    var tree = Ext.getCmp('forum-tree');
    tree.on('append', function(tree, p, node){
       if(node.id == 40){
           node.select.defer(100, node);
       }
    });
    var sm = tree.getSelectionModel();
    sm.on('beforeselect', function(sm, node){
         return node.isLeaf();
    });
    sm.on('selectionchange', function(sm, node){
        ds.loadForum(node.id);
        Ext.getCmp('main-view').setTitle(node.text);
    });


     var searchStore = new Ext.data.Store({
        proxy: new Ext.data.ScriptTagProxy({
            //url: 'http://extjs.com/forum/topics-browse-remote.php'
            url: 'http://localhost/Dragon_03/FetchForum.php'
        }),
        reader: new Ext.data.JsonReader({
            root: 'topics',
            totalProperty: 'totalCount',
            id: 'threadid'
        }, [
            'title', 'author',
            {name: 'lastpost', type: 'date', dateFormat: 'timestamp'}
        ])
    });

    // Custom rendering Template
    var resultTpl = new Ext.XTemplate(
        '<tpl for=".">',
            '<div class="x-combo-list-item search-item">{title} by <b>{author}</b></div>',
        '</tpl>'
    );

    var search = new Ext.form.ComboBox({
        store: searchStore,
        applyTo: 'search',
        displayField:'title',
        typeAhead: false,
        loadingText: 'Searching...',
        width: 200,
        pageSize:10,
        listWidth:550,
        hideTrigger:true,
        tpl: resultTpl,
        minChars:3,
        emptyText:'Quick Search',
        onSelect: function(record){ // override default onSelect to do redirect
            window.location =
                //String.format('http://extjs.com/forum/showthread.php?t={0}&p={1}', record.data.topicId, record.id);
                String.format('http://localhost/Dragon_03/FetchForum.php', record.data.topicId, record.id);
        }
    });
    // apply it to the exsting input element
    //search.applyTo('search');



    function toggleDetails(btn, pressed){
        var view = Ext.getCmp('topic-grid').getView();
        view.showPreview = pressed;
        view.refresh();
    }

    function togglePreview(btn, pressed){
        var preview = Ext.getCmp('preview');
        preview[pressed ? 'show' : 'hide']();
        preview.ownerCt.doLayout();
    }
});

Forum.TreeLoader = function(){
    Forum.TreeLoader.superclass.constructor.call(this);
    this.proxy = new Ext.data.ScriptTagProxy({
		//console.log(this.dataUrl);
    //this.proxy = new Ext.data.HttpProxy({
        url : this.dataUrl
        //url : 'http://localhost/Dragon_03/FetchForumList.php'
    });
};

/*
Ext.extend方法是用来实现类的继承。 
extend(Object subclass,Object superclass,[Object overrides] : Object 
第一个参数：子类 
第二个参数：父类 
第三个参数：要覆盖的属性。 
*/
Ext.extend(Forum.TreeLoader, Ext.tree.TreeLoader, {
    dataUrl: 'http://extjs.com/forum/forums-remote.php',
    //dataUrl: 'http://localhost/Dragon_03/FetchForumList.php',
    requestData : function(node, cb){
				//console.log(node);
				//console.log(cb);
        this.proxy.request('read', null, {}, {
            readRecords : function(o){
								//console.log(o);
                return o;
            }
        }, this.addNodes, this, {node:node, cb:cb});
    },

    addNodes : function(o, arg){
				//console.log(o);
        var node = arg.node;
        for(var i = 0, len = o.length; i < len; i++){
            var n = this.createNode(o[i]);
            if(n){
                node.appendChild(n);
            }
        }
        arg.cb(this, node);
    }
});
