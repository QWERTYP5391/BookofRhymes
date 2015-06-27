/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function Word (name, definition, synonym) 
{
    this.name = name;
    this.definition = definition;
    this.synonym = synonym;
}

function getWordName() 
{
    return this.name;
}

function getWordDefinition() 
{
    return this.defintion;
}

function getWordSynonym() 
{
    return this.synonym;
}


