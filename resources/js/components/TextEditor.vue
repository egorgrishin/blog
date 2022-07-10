<template>
	<div v-if="editor">
		<button @click="editor.chain().focus().toggleBold().run()">
			Bold
		</button>
		<button @click="editor.chain().focus().toggleItalic().run()">
			Italic
		</button>
		<button @click="editor.chain().focus().toggleUnderline().run()">
			Underline
		</button>
		<button @click="editor.chain().focus().toggleStrike().run()">
			Strike
		</button>

		<button @click="toggleLink">
			toggleLink
		</button>

		<select v-model="headingLevel" @change="editor.chain().focus().toggleHeading({level: Number(headingLevel)}).run()">
			<option value="1">Heading 1</option>
			<option value="2">Heading 2</option>
			<option value="3">Heading 3</option>
			<option value="4">Heading 4</option>
			<option value="5">Heading 5</option>
			<option value="6">Heading 6</option>
			<option value="7">Normal</option>
		</select>

		<select v-model="align" @change="editor.chain().focus().setTextAlign(align).run()">
			<option value="left">L</option>
			<option value="center">C</option>
			<option value="right">R</option>
		</select>

		<select v-model="font" @change="editor.chain().focus().setFontFamily(font).run()">
			<option value="sans-serif">sans-serif</option>
			<option value="serif">serif</option>
		</select>

		<select v-model="language">
			<option value="php">PHP</option>
			<option value="sql">SQL</option>
			<option value="javascript">JS</option>
			<option value="json">Json</option>
			<option value="xml">XML</option>
			<option value="css">CSS</option>
			<option value="less">Less</option>
			<option value="scss">SCSS</option>
			<option value="bash">Bash</option>
			<option value="shell">Shell</option>
		</select>
		<button @click="editor.chain().focus().toggleCodeBlock({language: language}).run()">
			setCodeBlock
		</button>
		<editor-content :editor="editor" />

		<button @click="save">Save</button>
		<div v-html="json"></div>
	</div>
</template>

<script setup>
import { ref } from 'vue'
import Document from '@tiptap/extension-document'
import Text from '@tiptap/extension-text'
import Paragraph from '@tiptap/extension-paragraph'
import History from '@tiptap/extension-history'
import Typography from '@tiptap/extension-typography'
import HardBreak from '@tiptap/extension-hard-break'
import Heading from '@tiptap/extension-heading'
import Link from '@tiptap/extension-link'

import Bold from '@tiptap/extension-bold'
import Italic from '@tiptap/extension-italic'
import Underline from '@tiptap/extension-underline'
import Strike from '@tiptap/extension-strike'

import TextAlign from '@tiptap/extension-text-align'

import TextStyle from '@tiptap/extension-text-style'
import FontFamily from '@tiptap/extension-font-family'

import CodeBlockLowlight from "@tiptap/extension-code-block-lowlight";
import { lowlight } from 'lowlight'

import { Editor, EditorContent,  } from '@tiptap/vue-3'
const editor = new Editor({
	extensions: [
		Document,
		Text,
		Paragraph,
		History,
		Typography,
		HardBreak,
		Heading,
		Link,

		Bold,
		Italic,
		Underline,
		Strike,

		TextAlign.configure({
			types: ['heading', 'paragraph'],
			alignments: ['left', 'center', 'right'],
		}),

		TextStyle,
		FontFamily,

		CodeBlockLowlight.configure({
			lowlight,
		})
	],
})

const toggleLink = () => {
	const previousUrl = editor.getAttributes('link').href
	if (previousUrl) {
		editor.chain().focus()
			.extendMarkRange('link')
			.unsetLink().run()
		return
	}

	const url = window.prompt('URL', previousUrl)
	editor.chain().focus()
		.extendMarkRange('link')
		.setLink({ href: url }).run()
}

const language = ref('php')
const headingLevel = ref('7')
const align = ref('left')
const font = ref('sans-serif')

const json = ref(editor.getHTML())
const save = () => {
	json.value = editor.getHTML()
}

</script>

<style lang="scss">
/* Basic editor styles */
.ProseMirror {
	> * + * {
		margin-top: 0.75em;
	}

	pre {
		background: #0D0D0D;
		color: #FFF;
		font-family: 'JetBrainsMono', monospace;
		padding: 0.75rem 1rem;
		border-radius: 0.5rem;

		code {
			color: inherit;
			padding: 0;
			background: none;
			font-size: 0.8rem;
		}

		.hljs-comment,
		.hljs-quote {
			color: #616161;
		}

		.hljs-variable,
		.hljs-template-variable,
		.hljs-attribute,
		.hljs-tag,
		.hljs-name,
		.hljs-regexp,
		.hljs-link,
		.hljs-name,
		.hljs-selector-id,
		.hljs-selector-class {
			color: #F98181;
		}

		.hljs-number,
		.hljs-meta,
		.hljs-built_in,
		.hljs-builtin-name,
		.hljs-literal,
		.hljs-type,
		.hljs-params {
			color: #FBBC88;
		}

		.hljs-string,
		.hljs-symbol,
		.hljs-bullet {
			color: #B9F18D;
		}

		.hljs-title,
		.hljs-section {
			color: #FAF594;
		}

		.hljs-keyword,
		.hljs-selector-tag {
			color: #70CFF8;
		}

		.hljs-emphasis {
			font-style: italic;
		}

		.hljs-strong {
			font-weight: 700;
		}
	}
}
</style>